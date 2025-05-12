import _ from 'lodash';
import axios from 'axios';
import jQuery from 'jquery';
import Dropzone from "dropzone";
import DataTable from 'datatables.net-bs5';


window._ = _;
window.$ = window.jQuery = jQuery;
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.Dropzone = Dropzone;
window.DataTable = DataTable;

