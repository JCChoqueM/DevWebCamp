<main class="registro">
    <h2 class="registro__heading"><?php echo $titulo; ?></h2>
    <p class="registro__descripcion">Elige tu plan</p>

    <div class="paquetes__grid">
        <div class="paquete">
            <h3 class="paquete__nombre">Pase Gratis</h3>
            <ul class="paquete__lista">
                <li class="paquete__elemento">Acceso Virtual a DevWebCamp</li>
            </ul>

            <p class="paquete__precio">$0</p>

            <form method="POST"
                  action="/finalizar-registro/gratis">
                <input class="paquetes__submit"
                       type="submit"
                       value="Inscripción Gratis">
            </form>
        </div>

        <div class="paquete">
            <h3 class="paquete__nombre">Pase Presencial</h3>
            <ul class="paquete__lista">
                <li class="paquete__elemento">Acceso Presencial a DevWebCamp</li>
                <li class="paquete__elemento">Pase por 2 días</li>
                <li class="paquete__elemento">Acceso a talleres y conferencias</li>
                <li class="paquete__elemento">Acceso a las grabaciones</li>
                <li class="paquete__elemento">Camisa del Evento</li>
                <li class="paquete__elemento">Comida y Bebida</li>
            </ul>

            <p class="paquete__precio">$199</p>

            <div>
                <style>
                    .pp-QU4F3FSE9FASJ {
                        text-align: center;
                        border: none;
                        border-radius: 1.5rem;
                        min-width: 11.625rem;
                        padding: 0 2rem;
                        height: 2.625rem;
                        font-weight: bold;
                        background-color: #FFD140;
                        color: #000000;
                        font-family: "Helvetica Neue", Arial, sans-serif;
                        font-size: 1rem;
                        line-height: 1.25rem;
                        cursor: pointer;
                    }
                </style>
                <form action="https://sandbox.paypal.com/ncp/payment/QU4F3FSE9FASJ"
                      method="post"
                      target="_blank"
                      style="display:inline-grid;justify-items:center;align-content:start;gap:0.5rem;">
                    <input class="pp-QU4F3FSE9FASJ"
                           type="submit"
                           value="Comprar ahora" />
                    <img src=https://www.paypalobjects.com/images/Debit_Credit.svg
                         alt="cards" />
                    <section style="font-size: 0.75rem;"> Con la tecnología de <img
                             src="https://www.paypalobjects.com/paypal-ui/logos/svg/paypal-wordmark-color.svg"
                             alt="paypal"
                             style="height:0.875rem;vertical-align:middle;" /></section>
                </form>
            </div>


        </div>

        <div class="paquete">
            <h3 class="paquete__nombre">Pase Virtual</h3>
            <ul class="paquete__lista">
                <li class="paquete__elemento">Acceso Virtual a DevWebCamp</li>
                <li class="paquete__elemento">Pase por 2 días</li>
                <li class="paquete__elemento">Acceso a talleres y conferencias</li>
                <li class="paquete__elemento">Acceso a las grabaciones</li>
            </ul>

            <p class="paquete__precio">$49</p>

            <div id="smart-button-container">
                <div style="text-align: center;">
                    <div id="paypal-button-container-virtual"></div>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="https://www.paypal.com/sdk/js?client-id=AY9CGnFuZW3hswuSexG3uQ4ilVbj2_Vbgjo6cxu8L9z8HdPHOfZ8YBQGlQes8E9p9r9Fg9ZuzgGJLCUV&enable-funding=venmo&currency=USD"
        data-sdk-integration-source="button-factory"></script>

<script>
    function initPayPalButton() {
        paypal.Buttons({
            style: {
                shape: 'rect',
                color: 'blue',
                layout: 'vertical',
                label: 'pay',
            },

            createOrder: function (data, actions) {
                return actions.order.create({
                    purchase_units: [{ "description": "1", "amount": { "currency_code": "USD", "value": 199 } }]
                });
            },

            onApprove: function (data, actions) {
                return actions.order.capture().then(function (orderData) {

                    const datos = new window.FormData();
                    datos.append('paquete_id', orderData.purchase_units[0].description);
                    datos.append('pago_id', orderData.purchase_units[0].payments.captures[0].id);

                    fetch('/finalizar-registro/pagar', {
                        method: 'POST',
                        body: datos
                    })
                        .then(respuesta => respuesta.json())
                        .then(resultado => {
                            if (resultado.resultado) {
                                actions.redirect('http://localhost:3000/finalizar-registro/conferencias');
                            }
                        })

                });
            },

            onError: function (err) {
                console.log(err);
            }
        }).render('#paypal-button-container');


        // Pase virtual
        paypal.Buttons({
            style: {
                shape: 'rect',
                color: 'blue',
                layout: 'vertical',
                label: 'pay',
            },

            createOrder: function (data, actions) {
                return actions.order.create({
                    purchase_units: [{ "description": "2", "amount": { "currency_code": "USD", "value": 49 } }]
                });
            },

            onApprove: function (data, actions) {
                return actions.order.capture().then(function (orderData) {

                    const datos = new window.FormData();
                    datos.append('paquete_id', orderData.purchase_units[0].description);
                    datos.append('pago_id', orderData.purchase_units[0].payments.captures[0].id);

                    fetch('/finalizar-registro/pagar', {
                        method: 'POST',
                        body: datos
                    })
                        .then(respuesta => respuesta.json())
                        .then(resultado => {
                            if (resultado.resultado) {
                                actions.redirect('http://localhost:3000/finalizar-registro/conferencias');
                            }
                        })

                });
            },

            onError: function (err) {
                console.log(err);
            }
        }).render('#paypal-button-container-virtual');

    }
    initPayPalButton();
</script>