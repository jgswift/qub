<?php
namespace qub\Tests\Mock {
    class UserFactoryMaker {
        function getUser() {
            return new UserRepresenter();
        }
    }
}