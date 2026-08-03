import fs from 'fs';
import path from 'path';

function updateIndex(fileDir, fileName, action) {
    const indexPath = path.join(fileDir, '_index.scss');
    const importLine = `@forward '${fileName}';`;

    if (action === 'add') {
        let content = fs.existsSync(indexPath)
            ? fs.readFileSync(indexPath, 'utf8')
            : '';

        if (!content.includes(importLine)) {
            fs.appendFileSync(indexPath, importLine + '\n');
            console.log(`[scss-auto-index] Añadido: ${importLine} (${fileDir})`);
        }
    }

    if (action === 'remove') {
        if (!fs.existsSync(indexPath)) return;

        let content = fs.readFileSync(indexPath, 'utf8');
        const updated = content
            .split('\n')
            .filter(line => !line.includes(importLine))
            .join('\n')
            .trim();

        if (updated === '') {
            fs.writeFileSync(indexPath, '');
            console.log(`[scss-auto-index] _index.scss vacío en ${fileDir}`);
        } else {
            fs.writeFileSync(indexPath, updated + '\n');
            console.log(`[scss-auto-index] Eliminado: ${importLine} (${fileDir})`);
        }
    }
}

function updateAppScss(scssAbsDir, folderName, action) {
    const appScssPath = path.join(scssAbsDir, 'app.scss');
    const useLine = `@use '${folderName}';`;

    if (action === 'add') {
        let content = fs.existsSync(appScssPath)
            ? fs.readFileSync(appScssPath, 'utf8')
            : '';

        if (!content.includes(useLine)) {
            fs.appendFileSync(appScssPath, useLine + '\n');
            console.log(`[scss-auto-index] app.scss: Añadido: ${useLine}`);
        }
    }

    if (action === 'remove') {
        if (!fs.existsSync(appScssPath)) return;

        let content = fs.readFileSync(appScssPath, 'utf8');
        const updated = content
            .split('\n')
            .filter(line => !line.includes(useLine))
            .join('\n')
            .trim();

        fs.writeFileSync(appScssPath, updated + '\n');
        console.log(`[scss-auto-index] app.scss: Eliminado: ${useLine}`);
    }
}

function ensureFolderIndex(folderAbsPath) {
    const indexPath = path.join(folderAbsPath, '_index.scss');
    if (!fs.existsSync(indexPath)) {
        fs.writeFileSync(indexPath, '');
        console.log(`[scss-auto-index] Creado _index.scss en ${folderAbsPath}/`);
    }
}

function buildInitialDirSet(absDir) {
    const dirs = new Set();

    function walk(currentAbsPath, currentRelPath) {
        if (!fs.existsSync(currentAbsPath)) return;

        const entries = fs.readdirSync(currentAbsPath, { withFileTypes: true });
        for (const entry of entries) {
            if (!entry.isDirectory()) continue;

            const relPath = currentRelPath ? `${currentRelPath}/${entry.name}` : entry.name;
            dirs.add(relPath);
            walk(path.join(currentAbsPath, entry.name), relPath);
        }
    }

    walk(absDir, '');
    return dirs;
}

// 🆕 NUEVO: Scanear una carpeta y agregar todos los archivos .scss al index
function scanAndIndexFolder(folderAbsPath) {
    try {
        const entries = fs.readdirSync(folderAbsPath, { withFileTypes: true });
        
        for (const entry of entries) {
            if (entry.isFile() && entry.name.endsWith('.scss') && entry.name !== '_index.scss') {
                const fileName = entry.name.replace(/^_/, '').replace('.scss', '');
                updateIndex(folderAbsPath, fileName, 'add');
            }
        }
    } catch (err) {
        console.error(`[scss-auto-index] Error scanning folder ${folderAbsPath}:`, err);
    }
}

function watchDir(scssDir) {
    const absDir = path.resolve(process.cwd(), scssDir);
    let knownDirs = buildInitialDirSet(absDir);

    const pendingEvents = new Map();
    const DEBOUNCE_DELAY = 100;

    fs.watch(absDir, { recursive: true }, (event, filename) => {
        if (!filename) return;
        if (event !== 'rename') return;

        if (pendingEvents.has(filename)) {
            clearTimeout(pendingEvents.get(filename));
        }

        const timeoutId = setTimeout(() => {
            processEvent(filename);
            pendingEvents.delete(filename);
        }, DEBOUNCE_DELAY);

        pendingEvents.set(filename, timeoutId);
    });

    function processEvent(filename) {
        const relPath = filename.split(path.sep).join('/');
        const filePath = path.join(absDir, filename);
        const exists = fs.existsSync(filePath);

        const parentRelDir = path.dirname(relPath);
        const isTopLevel = parentRelDir === '.';
        const parentAbsDir = path.dirname(filePath);
        const baseName = path.basename(relPath);

        const isDirNow = exists && fs.statSync(filePath).isDirectory();
        const wasKnownDir = knownDirs.has(relPath);

        // --- CARPETAS ---
        if (isDirNow || wasKnownDir) {
            if (exists && !wasKnownDir) {
                // 🆕 Carpeta nueva: crear index y scanear contenido
                knownDirs.add(relPath);
                ensureFolderIndex(filePath);
                
                // 🆕 RE-SCANEAR LA CARPETA para encontrar archivos existentes
                scanAndIndexFolder(filePath);

                if (isTopLevel) {
                    updateAppScss(absDir, baseName, 'add');
                } else {
                    updateIndex(parentAbsDir, baseName, 'add');
                }
                console.log(`[scss-auto-index] Carpeta creada y escaneada: ${relPath}/`);
            } else if (!exists && wasKnownDir) {
                // Carpeta eliminada
                knownDirs.delete(relPath);

                for (const d of Array.from(knownDirs)) {
                    if (d.startsWith(relPath + '/')) knownDirs.delete(d);
                }

                if (isTopLevel) {
                    updateAppScss(absDir, baseName, 'remove');
                } else {
                    updateIndex(parentAbsDir, baseName, 'remove');
                }
                console.log(`[scss-auto-index] Carpeta eliminada: ${relPath}/`);
            }
            return;
        }

        // --- ARCHIVOS .scss ---
        if (!filename.endsWith('.scss')) return;
        if (path.basename(filename) === '_index.scss') return;

        const fileName = path.basename(filename, '.scss').replace(/^_/, '');

        const parentExists = fs.existsSync(parentAbsDir);
        if (!parentExists) {
            console.log(`[scss-auto-index] Directorio padre no existe: ${parentAbsDir}`);
            return;
        }

        if (exists) {
            ensureFolderIndex(parentAbsDir);
            updateIndex(parentAbsDir, fileName, 'add');
            console.log(`[scss-auto-index] Archivo: ${relPath}`);
        } else {
            updateIndex(parentAbsDir, fileName, 'remove');
            console.log(`[scss-auto-index] Archivo eliminado: ${relPath}`);
        }
    }
}

export default function scssAutoIndex(scssDir = 'src/scss') {
    return {
        name: 'scss-auto-index',
        configureServer() {
            const absDir = path.resolve(process.cwd(), scssDir);
            console.log(`[scss-auto-index] Watching: ${absDir}`);
            watchDir(scssDir);
        }
    };
}