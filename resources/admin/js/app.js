import './bootstrap.js';
import '../scss/app.scss';
import Swal from 'sweetalert2'
import 'datatables.net-bs5'
import 'tinymce/tinymce';
import 'tinymce/skins/ui/oxide/skin.min.css';
import 'tinymce/icons/default/icons';
import 'tinymce/themes/silver/theme';
import 'tinymce/models/dom/model';
import '@selectize/selectize';

import.meta.glob([
	'../images/**'
])

window.Swal = Swal;

window.ajaxDefaultErrorCallback = function (result, returnResponse = false) {
    if (result.responseJSON) {
        let message = [];

        if (result.responseJSON.errors) {
            $.each(result.responseJSON.errors, function (key, item) {
                $.each(item, function (key2, m) {
                    message.push(m);
                });
            });
        } else if (result.responseJSON.message) {
            message.push(result.responseJSON.message);
        }

        if (message.length > 0) {

            if (returnResponse)
                return message.join("<br />");

            Swal.fire("", message.join("<br />"), 'error').then(() => {
            });
        }
    }

    return '';
}

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    },
    beforeSend: function () {
    },
    complete: function () {
    },
    error: window.ajaxDefaultErrorCallback
});

$.extend(true, $.fn.dataTable.defaults, {
    language: {
        "info": "_TOTAL_ kayıttan _START_ - _END_ arasındaki kayıtlar gösteriliyor",
        "infoEmpty": "Kayıt yok",
        "infoFiltered": "(_MAX_ kayıt içerisinden bulunan)",
        "infoThousands": ".",
        "lengthMenu": "Sayfada _MENU_ kayıt göster",
        "loadingRecords": "Yükleniyor...",
        "processing": "İşleniyor...",
        "search": "Ara:",
        "zeroRecords": "Eşleşen kayıt bulunamadı",
        "paginate": {
            "first": "İlk",
            "last": "Son",
            "next": "Sonraki",
            "previous": "Önceki"
        },
        "aria": {
            "sortAscending": ": artan sütun sıralamasını aktifleştir",
            "sortDescending": ": azalan sütun sıralamasını aktifleştir"
        },
        "select": {
            "rows": {
                "_": "%d kayıt seçildi",
                "1": "1 kayıt seçildi"
            },
            "cells": {
                "1": "1 hücre seçildi",
                "_": "%d hücre seçildi"
            },
            "columns": {
                "1": "1 sütun seçildi",
                "_": "%d sütun seçildi"
            }
        },
        "autoFill": {
            "cancel": "İptal",
            "fillHorizontal": "Hücreleri yatay olarak doldur",
            "fillVertical": "Hücreleri dikey olarak doldur",
            "fill": "Bütün hücreleri <i>%d<\/i> ile doldur",
            "info": "Detayı"
        },
        "buttons": {
            "collection": "Koleksiyon <span class=\"ui-button-icon-primary ui-icon ui-icon-triangle-1-s\"><\/span>",
            "colvis": "Sütun görünürlüğü",
            "colvisRestore": "Görünürlüğü eski haline getir",
            "copySuccess": {
                "1": "1 satır panoya kopyalandı",
                "_": "%ds satır panoya kopyalandı"
            },
            "copyTitle": "Panoya kopyala",
            "csv": "CSV",
            "excel": "Excel",
            "pageLength": {
                "-1": "Bütün satırları göster",
                "_": "%d satır göster",
                "1": "1 Satır Göster"
            },
            "pdf": "PDF",
            "print": "Yazdır",
            "copy": "Kopyala",
            "copyKeys": "Tablodaki veriyi kopyalamak için CTRL veya u2318 + C tuşlarına basınız. İptal etmek için bu mesaja tıklayın veya escape tuşuna basın.",
            "createState": "Şuanki Görünümü Kaydet",
            "removeAllStates": "Tüm Görünümleri Sil",
            "removeState": "Aktif Görünümü Sil",
            "renameState": "Aktif Görünümün Adını Değiştir",
            "savedStates": "Kaydedilmiş Görünümler",
            "stateRestore": "Görünüm -&gt; %d",
            "updateState": "Aktif Görünümün Güncelle"
        },
        "searchBuilder": {
            "add": "Koşul Ekle",
            "button": {
                "0": "Arama Oluşturucu",
                "_": "Arama Oluşturucu (%d)"
            },
            "condition": "Koşul",
            "conditions": {
                "date": {
                    "after": "Sonra",
                    "before": "Önce",
                    "between": "Arasında",
                    "empty": "Boş",
                    "equals": "Eşittir",
                    "not": "Değildir",
                    "notBetween": "Dışında",
                    "notEmpty": "Dolu"
                },
                "number": {
                    "between": "Arasında",
                    "empty": "Boş",
                    "equals": "Eşittir",
                    "gt": "Büyüktür",
                    "gte": "Büyük eşittir",
                    "lt": "Küçüktür",
                    "lte": "Küçük eşittir",
                    "not": "Değildir",
                    "notBetween": "Dışında",
                    "notEmpty": "Dolu"
                },
                "string": {
                    "contains": "İçerir",
                    "empty": "Boş",
                    "endsWith": "İle biter",
                    "equals": "Eşittir",
                    "not": "Değildir",
                    "notEmpty": "Dolu",
                    "startsWith": "İle başlar",
                    "notContains": "İçermeyen",
                    "notStartsWith": "Başlamayan",
                    "notEndsWith": "Bitmeyen"
                },
                "array": {
                    "contains": "İçerir",
                    "empty": "Boş",
                    "equals": "Eşittir",
                    "not": "Değildir",
                    "notEmpty": "Dolu",
                    "without": "Hariç"
                }
            },
            "data": "Veri",
            "deleteTitle": "Filtreleme kuralını silin",
            "leftTitle": "Kriteri dışarı çıkart",
            "logicAnd": "ve",
            "logicOr": "veya",
            "rightTitle": "Kriteri içeri al",
            "title": {
                "0": "Arama Oluşturucu",
                "_": "Arama Oluşturucu (%d)"
            },
            "value": "Değer",
            "clearAll": "Filtreleri Temizle"
        },
        "searchPanes": {
            "clearMessage": "Hepsini Temizle",
            "collapse": {
                "0": "Arama Bölmesi",
                "_": "Arama Bölmesi (%d)"
            },
            "count": "{total}",
            "countFiltered": "{shown}\/{total}",
            "emptyPanes": "Arama Bölmesi yok",
            "loadMessage": "Arama Bölmeleri yükleniyor ...",
            "title": "Etkin filtreler - %d",
            "showMessage": "Tümünü Göster",
            "collapseMessage": "Tümünü Gizle"
        },
        "thousands": ".",
        "datetime": {
            "amPm": [
                "öö",
                "ös"
            ],
            "hours": "Saat",
            "minutes": "Dakika",
            "next": "Sonraki",
            "previous": "Önceki",
            "seconds": "Saniye",
            "unknown": "Bilinmeyen",
            "weekdays": {
                "6": "Paz",
                "5": "Cmt",
                "4": "Cum",
                "3": "Per",
                "2": "Çar",
                "1": "Sal",
                "0": "Pzt"
            },
            "months": {
                "9": "Ekim",
                "8": "Eylül",
                "7": "Ağustos",
                "6": "Temmuz",
                "5": "Haziran",
                "4": "Mayıs",
                "3": "Nisan",
                "2": "Mart",
                "11": "Aralık",
                "10": "Kasım",
                "1": "Şubat",
                "0": "Ocak"
            }
        },
        "decimal": ",",
        "editor": {
            "close": "Kapat",
            "create": {
                "button": "Yeni",
                "submit": "Kaydet",
                "title": "Yeni kayıt oluştur"
            },
            "edit": {
                "button": "Düzenle",
                "submit": "Güncelle",
                "title": "Kaydı düzenle"
            },
            "error": {
                "system": "Bir sistem hatası oluştu (Ayrıntılı bilgi)"
            },
            "multi": {
                "info": "Seçili kayıtlar bu alanda farklı değerler içeriyor. Seçili kayıtların hepsinde bu alana aynı değeri atamak için buraya tıklayın; aksi halde her kayıt bu alanda kendi değerini koruyacak.",
                "noMulti": "Bu alan bir grup olarak değil ancak tekil olarak düzenlenebilir.",
                "restore": "Değişiklikleri geri al",
                "title": "Çoklu değer"
            },
            "remove": {
                "button": "Sil",
                "confirm": {
                    "_": "%d adet kaydı silmek istediğinize emin misiniz?",
                    "1": "Bu kaydı silmek istediğinizden emin misiniz?"
                },
                "submit": "Sil",
                "title": "Kayıtları sil"
            }
        },
        "stateRestore": {
            "creationModal": {
                "button": "Kaydet",
                "columns": {
                    "search": "Kolon Araması",
                    "visible": "Kolon Görünümü"
                },
                "name": "Görünüm İsmi",
                "order": "Sıralama",
                "paging": "Sayfalama",
                "scroller": "Kaydırma (Scrool)",
                "search": "Arama",
                "searchBuilder": "Arama Oluşturucu",
                "select": "Seçimler",
                "title": "Yeni Görünüm Oluştur",
                "toggleLabel": "Kaydedilecek Olanlar"
            },
            "duplicateError": "Bu Görünüm Daha Önce Tanımlanmış",
            "emptyError": "Görünüm Boş Olamaz",
            "emptyStates": "Herhangi Bir Görünüm Yok",
            "removeJoiner": "ve",
            "removeSubmit": "Sil",
            "removeTitle": "Görünüm Sil",
            "renameButton": "Değiştir",
            "renameLabel": "Görünüme Yeni İsim Ver -&gt; %s:",
            "renameTitle": "Görünüm İsmini Değiştir",
            "removeConfirm": "Görünümü silmek istediğinize emin misiniz?",
            "removeError": "Görünüm silinemedi"
        },
        "emptyTable": "Tabloda veri bulunmuyor",
        "searchPlaceholder": "Ara..."
    },
    drawCallback: function () {
        if (document.querySelector('.btn-delete')) {
            document.querySelectorAll('.btn-delete').forEach(function (btn, i) {
                btn.addEventListener('click', async function () {
                    let thisEl = this;
                    let id = parseInt(thisEl.getAttribute('data-id')) || 0;
                    let url = thisEl.getAttribute('data-url');

                    if (id <= 0 || url.length <= 0)
                        return false;
                    let datatable = document.querySelector('.table-datatable');
                    window.Swal.fire({
                        title: "Silmek istediğine emin misin?",
                        icon: "question",
                        showCancelButton: true,
                        cancelButtonText: "Hayır",
                        confirmButtonText: "Evet",
                        focusConfirm: true,
                    }).then(async (result) => {
                        if (result.isConfirmed) {
                            await axios.post(url, {
                                _method: 'DELETE',
                            })
                            if (datatable) {
                                $.fn.dataTable.Api('.table-datatable').ajax.reload();
                            }
                        }
                    });
                });
            });
        }
        if (document.querySelector('.btn-called')) {
            document.querySelectorAll('.btn-called').forEach(function (btn, i) {
                btn.addEventListener('click', async function () {
                    let thisEl = this;
                    let id = parseInt(thisEl.getAttribute('data-id')) || 0;
                    let url = thisEl.getAttribute('data-url');

                    if (id <= 0 || url.length <= 0)
                        return false;
                    let datatable = document.querySelector('.table-datatable');
                    window.Swal.fire({
                        title: "Arandı olarak işaretlemek istediğine emin misin?",
                        icon: "question",
                        showCancelButton: true,
                        cancelButtonText: "Hayır",
                        confirmButtonText: "Evet",
                        focusConfirm: true,
                    }).then(async (result) => {
                        if (result.isConfirmed) {
                            await axios.post(url, {
                                _method: 'POST',
                            })
                            if (datatable) {
                                $.fn.dataTable.Api('.table-datatable').ajax.reload();
                            }
                        }
                    });
                });
            });
        }
        if (document.querySelector('.btn-remove-called')) {
            document.querySelectorAll('.btn-remove-called').forEach(function (btn, i) {
                btn.addEventListener('click', async function () {
                    let thisEl = this;
                    let id = parseInt(thisEl.getAttribute('data-id')) || 0;
                    let url = thisEl.getAttribute('data-url');

                    if (id <= 0 || url.length <= 0)
                        return false;
                    let datatable = document.querySelector('.table-datatable');
                    window.Swal.fire({
                        title: "Arandı işaretini geri almak istediğine emin misin?",
                        icon: "question",
                        showCancelButton: true,
                        cancelButtonText: "Hayır",
                        confirmButtonText: "Evet",
                        focusConfirm: true,
                    }).then(async (result) => {
                        if (result.isConfirmed) {
                            await axios.post(url, {
                                _method: 'POST',
                            })
                            if (datatable) {
                                $.fn.dataTable.Api('.table-datatable').ajax.reload();
                            }
                        }
                    });
                });
            });
        }
        if (document.querySelector('.btn-returned')) {
            document.querySelectorAll('.btn-returned').forEach(function (btn, i) {
                btn.addEventListener('click', async function () {
                    let thisEl = this;
                    let id = parseInt(thisEl.getAttribute('data-id')) || 0;
                    let url = thisEl.getAttribute('data-url');

                    if (id <= 0 || url.length <= 0)
                        return false;
                    let datatable = document.querySelector('.table-datatable');
                    window.Swal.fire({
                        title: "Dönüş yapıldı olarak işaretlemek istediğine emin misin?",
                        icon: "question",
                        showCancelButton: true,
                        cancelButtonText: "Hayır",
                        confirmButtonText: "Evet",
                        focusConfirm: true,
                    }).then(async (result) => {
                        if (result.isConfirmed) {
                            await axios.post(url, {
                                _method: 'POST',
                            })
                            if (datatable) {
                                $.fn.dataTable.Api('.table-datatable').ajax.reload();
                            }
                        }
                    });
                });
            });
        }
        if (document.querySelector('.btn-remove-returned')) {
            document.querySelectorAll('.btn-remove-returned').forEach(function (btn, i) {
                btn.addEventListener('click', async function () {
                    let thisEl = this;
                    let id = parseInt(thisEl.getAttribute('data-id')) || 0;
                    let url = thisEl.getAttribute('data-url');

                    if (id <= 0 || url.length <= 0)
                        return false;
                    let datatable = document.querySelector('.table-datatable');
                    window.Swal.fire({
                        title: "Dönüş yapıldı işaretini geri almak istediğine emin misin?",
                        icon: "question",
                        showCancelButton: true,
                        cancelButtonText: "Hayır",
                        confirmButtonText: "Evet",
                        focusConfirm: true,
                    }).then(async (result) => {
                        if (result.isConfirmed) {
                            await axios.post(url, {
                                _method: 'POST',
                            })
                            if (datatable) {
                                $.fn.dataTable.Api('.table-datatable').ajax.reload();
                            }
                        }
                    });
                });
            });
        }
    }
});

tinymce.init({
    selector: '.tinyMce',
    skin: false,
    content_css: false,
    menubar: false,
    plugins: "textcolor",
    toolbar: "h1 h2 h3 h4 h5 bold italic blockquote | forecolor | link | table | code | media",
});

window.dropzoneAddedFilesEventHandler = function () {
    document.querySelector('form button[type="submit"]').setAttribute('disabled', 'disabled');
}
window.dropzoneQueueCompleteEventHandler = function () {
    document.querySelector('form button[type="submit"]').removeAttribute('disabled');
}
$('.select-box').selectize()

$(".input-tags").selectize({
    delimiter: ",",
    persist: false,
    create: function (input) {
        return {
            value: input,
            text: input,
        };
    },
});
