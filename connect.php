<?php
require('stripe-php-master/init.php');

$publishableKey="pk_test_51MMijBHmrwinhnCe2WzXT0EvwvTN2L0CTuBmqn4oGPCBAA6ElxPHcw9JTvN4jxWpUCnRO1RUeWewSmP9pnmXYQuI00Zqv5ZyYL";

$secretKey="sk_test_51MMijBHmrwinhnCeby38t8cIweX3syRNixqMdzUiAsmMDMO8mMTHABXJOTg09p8mKWnjB9UWyATrDCXeEEeWGWUE008WWtlNua";

\Stripe\Stripe::setApiKey($secretKey);
?>