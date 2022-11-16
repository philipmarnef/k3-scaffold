<?php

return [
  'ready' => function () {
    // turn on debug mode for logged-in admins
    return ['debug' => kirby()->user() !== null && kirby()->user()->role()->isAdmin()];
	},
];
