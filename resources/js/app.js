import './bootstrap';
import '../scss/app.scss';
import Swiper from "swiper";
import Swal from 'sweetalert2'
import { Navigation, Pagination } from 'swiper/modules';

// Swiper modüllerini ayarlayın
Swiper.use([Navigation, Pagination]);

import.meta.glob([
    '../images/**'
])

window.Swal = Swal;
window.Swal.mixin({
    focusCancel: false,
    focusConfirm: false,
    focusDeny: false
})
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

document.addEventListener('DOMContentLoaded', function() {
    const bestsellersSlider = new Swiper('.bestsellers-slider', {
        slidesPerView: 1,
        spaceBetween: 20,
        navigation: {
            nextEl: '.bestsellers-next',
            prevEl: '.bestsellers-prev',
        },
        pagination: {
            el: '.bestsellers-pagination',
            clickable: true,
        },
        breakpoints: {
            640: {
                slidesPerView: 2,
            },
            768: {
                slidesPerView: 3,
            },
            1024: {
                slidesPerView: 4,
            },
        },
    });

    const newArrivalsSlider = new Swiper('.new-arrivals-slider', {
        slidesPerView: 1,
        spaceBetween: 20,
        navigation: {
            nextEl: '.new-arrivals-next',
            prevEl: '.new-arrivals-prev',
        },
        pagination: {
            el: '.new-arrivals-pagination',
            clickable: true,
        },
        breakpoints: {
            640: {
                slidesPerView: 2,
            },
            768: {
                slidesPerView: 3,
            },
            1024: {
                slidesPerView: 4,
            },
        },
    });

    const discoverSlider = new Swiper('.discover-slider', {
        slidesPerView: 1,
        spaceBetween: 20,
        navigation: {
            nextEl: '.discover-next',
            prevEl: '.discover-prev',
        },
        pagination: {
            el: '.discover-pagination',
            clickable: true,
        },
        breakpoints: {
            640: {
                slidesPerView: 2,
            },
            768: {
                slidesPerView: 3,
            },
            1024: {
                slidesPerView: 4,
            },
        },
    });
});

window.addEventListener('DOMContentLoaded', () => {
    $(".add-to-cart").on("click", function () {
        const productId = $(this).data("id");
        const $button = $(this);

        $button.attr("disabled", "disabled").text("Ekleniyor...");

        $.ajax({
            url: `/sepet/ekle/${productId}`,
            method: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr("content")
            },
            success: function (response) {
                location.reload()
            },
            error: function (e) {
                console.error(e);
                Swal.fire({
                    icon: 'error',
                    title: 'Hata!',
                    text: 'Ürün sepete eklenirken bir hata oluştu.',
                    confirmButtonText: 'Tamam'
                });
            },
            complete: function () {
                $button.removeAttr("disabled").text("Sepete Ekle");
            }
        });
    });
});
