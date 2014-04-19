<?php
namespace qub\Tests\Mock {
    class UserViewTranslator {
        function render(UserRepresenter $user) {
            return 'html';
        }
    }
}