<?php
/**
 * https://pestphp.com/docs/writing-tests
 */
function sum($x, $y) {
    return $x + $y;
}

test('sum', function () {
   $result = sum(1, 2);

   expect($result)->toBe(3);
});

it('performs sums', function () {
   $result = sum(1, 2);

   expect($result)->toBe(3);
});

describe('sum', function () {
   it('may sum integers', function () {
       $result = sum(1, 2);

       expect($result)->toBe(3);
    });

    it('may sum floats', function () {
       $result = sum(1.5, 2.5);

       expect($result)->toBe(4.0);
    });
});
