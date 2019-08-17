$(document).ready(function() {
var name;
var price;

getProducts();

        $( "#sent" ).click(function() {
                name = $( "#name" ).val()
                price = $( "#price" ).val()
                if( name == '' &&  price == '' && Number(price)) {
                    alert('llenar campos')
                } else {
                    saveProduct()
                }
            })
            function saveProduct() {
                    $.post('app/controller/crud_product_controller.php',
                    {nameFunction:'save', name:name, price:price}, 
                    function(response) {
                    console.log(response,'response');
                    getProducts();
                    });
            }
            function getProducts() {
                $.get('app/controller/crud_product_controller.php',
                {nameFunction:'get'}, 
                function(response) {
                    console.log(response,'response');
                    items = [];
                    $.each(response.result, function (key, val) {
                            items.push( "<tr>" );
                            items.push( "<td id=''"+key+"''>"+val.id+"</td>" );
                            items.push( "<td id=''"+key+"''>"+val.name+"</td>" );
                            items.push( "<td id=''"+key+"''>"+val.price+"</td>" );
                            items.push( "</tr>" );
                        });
                        $("<tbody/>", {html: items.join("")}).appendTo("table");
                });
            }
			
})
