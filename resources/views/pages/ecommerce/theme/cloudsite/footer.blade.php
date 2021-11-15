 <!-- Footer section -->
 <footer>
    <div class='footer-social-section'>

    </div>
    <p class='footer-info'>
        <a href='#' class='under-development' data-title='T&C' data-desc='This will redirect the customer to the merchant’s T&C page, and the content will be prepared by the merchant.'> Terms and Conditions</a>
        <a href='#' class='under-development' data-title='Privacy Policy' data-desc='This will redirect the customer to the merchant’s Privacy Policy page, and the content will be prepared by the merchant.'> Privacy Policy</a>
        <a href='#' class='under-development' data-title='Delivery & Return Policy' data-desc='This will redirect the customer to the merchant’s Delivery & Return Policy page, and the content will be prepared by the merchant.'> Delivery & Return Policy</a>
    </p>
    <p clsas='footer-copyright'>
        &copy;
        <script>
            document.write(new Date().getFullYear());
        </script> {{$merchant->name}} All rights reserved
    </p>
    <p class='footer-powered'>
        Powered By <a href='{{ENV("WEBSITE_URL")}}' target="_blank"> Cloudsite </a>
    </p>

</footer>