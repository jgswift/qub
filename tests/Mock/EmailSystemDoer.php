<?php
namespace qub\Tests\Mock {
    class EmailSystemDoer {
        function send($message) {
            return true; // EMAIL SUCCESSFULLY SENT
        }
    }
}