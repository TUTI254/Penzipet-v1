$('#searchProducts').keyup(function() {
    $("#searchResult").html('')
    var searchField = $.trim($(this).val())
    var data = {
        searchKey: searchField
    }

    if (searchField.length >= 2) {
        $.get(url+'home/get_search_data', data, function(response) {
            const data = JSON.parse(response)
            if (data.response == 'error') {
                $("#searchResult").append(
                    `<li class="list-group-item text-center py-3">${data.message}</li>`
                )
            } else {
                var productError = ''
                $.each(data, function(key, value) {
                    if (value.product_quantity > 0 && value.status == '1') {
                        $("#searchResult").append(
                            `<li class="list-group-item" style="position:relative; display:block; padding: 0.32rem 1.25rem; margin-bottom:-1px; background-color:#fff; border: 1px solid #e7eaf3;">
                                        <a style="text-decoration:none; color: #000" href="${url+value.name}" class="searchLinks">
                                            <div class="row">
                                                <div class="col-2">
                                                    <img class="img-fluid max-width-60 p-1 border border-color-1 mr-2" src="assets/images/shop/products/500x600.png" width="50" alt="">
                                                </div>
                                                <div class="col-10">
                                                    ${value.name} -- <strong>${'Ksh.' + numberWithCommas(value.price)}</strong>
                                                </div>
                                            </div>
                                        </a>
                                    </li>`
                        )
                    } else {
                        productError = `<li class="list-group-item text-center py-3">Product not Found.</li>`
                    }
                })
                $("#searchResult").append(productError)
            }
        })
    }
})


function numberWithCommas(money) {
    return money.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

var page = 10;
$(window).scroll(()=>{
    if($(window).scrollTop() + $(window).height() >= $(document).height() ){
        // page++;
        page += 9;
        loadMoreData(page);
    }
});

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
} else {
    mybutton.style.display = "none";
}
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
document.body.scrollTop = 0;
document.documentElement.scrollTop = 0;
}

function loadMoreData(page){
    $.ajax({
        url: '?page=' + page,
        type: 'get',
        beforeSend: function(){
            $('.ajax-load').show();
        }
    }).done((data) => {
        if(data == ""){
            $('.ajax-load').html("");
            return;
        }
        setTimeout(function(){

            $('.ajax-load').hide();
            $('#post-data').append(data);
        },200)
    }).fail((jqXHR, ajaxOptions, throwError)=>{
        alert('server not responding');
        console.log(throwError);
    })
}
