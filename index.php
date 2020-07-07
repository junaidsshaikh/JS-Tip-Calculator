<!DOCTYPE html>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;" />
        <meta charset="utf-8" />
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&display=swap" rel="stylesheet" />
        <title>JS Tip Calculator</title>

        <link rel="stylesheet" type="text/css" href="style.css" />
    </head>

    <body>
        <div class="calc-wrapper">
            <form>
                <div class="input-text">
                    <label for="subtotal">
                        Sub Total
                        <div class="rupee-sign-wrapper">
                            <input type="number" id="subtotal" name="subtotal" placeholder="0.00" oninput="getTotal()" />
                        </div>
                    </label>
                </div>

                <label for="tipPercent">Tip Amount</label>
                <div class="range-wrap">
                    <input type="range" min="0" max="100" value="20" class="slider range" id="tip-percent" name="tipPercent" oninput="getTotals()" />
                    <output class="bubble"></output>
                </div>
            </form>

            <div class="output-wrapper">
                <p class="tip">Tip <span class="rupee-sign">₹</span><span id="tip-amount" class="amount">0.00</span></p>
                <p class="total">Total <span class="rupee-sign">₹</span><span id="total-amount" class="amount">0.00</span></p>
            </div>
            <!--end output-wrapper-->
        </div>
        <!--end calc-wrapper-->

        <script>
            const allRanges = document.querySelectorAll(".range-wrap");
            allRanges.forEach((wrap) => {
                const range = wrap.querySelector(".range");
                const bubble = wrap.querySelector(".bubble");

                range.addEventListener("input", () => {
                    setBubble(range, bubble);
                });
                setBubble(range, bubble);
            });

            function setBubble(range, bubble) {
                const val = range.value;
                const min = range.min ? range.min : 0;
                const max = range.max ? range.max : 100;
                const newVal = Number(((val - min) * 100) / (max - min));
                bubble.innerHTML = val + "%";

                bubble.style.left = "calc(${newVal}% + (${35 - newVal * .75}px))";
            }

            function getTotal() {
                let subtotal = document.getElementById("subtotal").value;
                let tipPercent = document.getElementById("tip-percent").value;

                let tipAmount = (subtotal * tipPercent) / 100;
                tipAmount = tipAmount.toFixed(2);
                document.getElementById("tip-amount").innerHTML = tipAmount;

                let totalAmount = +subtotal + +tipAmount;
                totalAmount = totalAmount.toFixed(2);
                document.getElementById("total-amount").innerHTML = totalAmount;
            }
        </script>
    </body>
</html>
