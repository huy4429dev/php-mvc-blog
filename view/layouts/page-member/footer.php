
<div class="footer">
            <div class="container">
                <p>Cảm ơn bạn đã ghé thăm website của tôi</p>
                <p>@2019 - Nguyen Minh Quan. All Right Reserved. Designed and Developed by <a id="designweb" style="text-decoration: none" target="_blank" href="http://facebook.com/minhquan.roger">NMQ</a> </p>
            </div>
        </div>
        <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
        <script>
            //Get the button
            var mybutton = document.getElementById("myBtn");

            // When the user scrolls down 20px from the top of the document, show the button
            window.onscroll = function() {scrollFunction()};

            function scrollFunction() {
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    mybutton.style.display = "block";
                } else {
                    mybutton.style.display = "none";
                }
            }

            // When the user clicks on the button, scroll to the top of the document
            function topFunction() {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            }
        </script>
    </body>
</html>