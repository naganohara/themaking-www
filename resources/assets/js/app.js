import '../sass/app.scss';

import $ from 'jquery';
import Popper from 'popper.js/dist/umd/popper';
import 'bootstrap/dist/js/bootstrap';

console.log('$.ajax: ' + typeof $.ajax);
console.log('popper: ' + typeof Popper.Defaults);
console.log(`Hello ES${63 * (2 ** 6) / 2}`);
