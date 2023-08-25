        <!-- jQuery  -->
        <script src="{{ URL::asset('assets/js/jquery.min.js')}}"></script>
        <script src="{{ URL::asset('assets/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{ URL::asset('assets/js/metisMenu.min.js')}}"></script>
        <script src="{{ URL::asset('assets/js/jquery.slimscroll.js')}}"></script>
        <script src="{{ URL::asset('assets/js/waves.min.js')}}"></script>

        <script src="{{ URL::asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>

        @yield('script')

        <!-- App js -->
        <script src="{{ URL::asset('assets/js/app.js')}}"></script>
        <!-- Required datatable js -->
        <script src="{{ URL::asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
        <!-- Buttons examples -->
        <script src="{{ URL::asset('assets/plugins/datatables/dataTables.buttons.min.js')}}"></script>
        <script src="{{ URL::asset('assets/plugins/datatables/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{ URL::asset('assets/plugins/datatables/jszip.min.js')}}"></script>
        <script src="{{ URL::asset('assets/plugins/datatables/pdfmake.min.js')}}"></script>
        <script src="{{ URL::asset('assets/plugins/datatables/vfs_fonts.js')}}"></script>
        <script src="{{ URL::asset('assets/plugins/datatables/buttons.html5.min.js')}}"></script>
        <script src="{{ URL::asset('assets/plugins/datatables/buttons.print.min.js')}}"></script>
        <script src="{{ URL::asset('assets/plugins/datatables/buttons.colVis.min.js')}}"></script>
        <!-- Responsive examples -->
        <script src="{{ URL::asset('assets/plugins/datatables/dataTables.responsive.min.js')}}"></script>
        <script src="{{ URL::asset('assets/plugins/datatables/responsive.bootstrap4.min.js')}}"></script>
        <!-- Datatable init js -->
        <script src="{{ URL::asset('assets/pages/datatables.init.js')}}"></script>
        <!-- sweet alert -->
        <script src="{{ URL::asset('assets/plugins/sweet-alert2/sweetalert2.min.js')}}"></script>
        <script src="{{ URL::asset('assets/pages/sweet-alert.init.js')}}"></script>
        @yield('script-bottom')

                <script>
        $(document).ready(function(){
            $(".addGalleryImage").on('click',function(){
                var inputFile = `<div style="margin:10px 0px 10px 0px;" class="imgRow"><div style="width:100%;"><input type="file" name="gallery[]" class="form-control" autocomplete="off" style="width:70%;  display: inline-block;">
                <button type="button" class="btn btn-outline-danger waves-effect waves-light removeGalleryImageRow">X</button></div></div>`;
                $(".inputBox").append(inputFile);
            });
        });
        $(document).on('change',"input[type='file']", function () {
            var fileName = this.files[0].name;
            var extention = fileName.split('.').pop();
            if(extention=='mp4'){
                if(this.files[0].size > 15000000) {
                    alert("Please upload file less than 15MB. Thanks!!");
                    $(this).val('');
                    }
               
            }else{
               if(this.files[0].size > 2000000) {
                    alert("Please upload file less than 2MB. Thanks!!");
                    $(this).val('');
                }
            }
            }); 
            $(document).on('click',".removeGalleryImageRow", function () {
                $(this).closest('.imgRow').remove();
            });

        function cal_price_data()
        {
            var symbol_id = $("#base_product").val();
            var token =  '<?php echo csrf_token(); ?>';
            $.ajax({
                url : "<?php echo url('product/get_price_list'); ?>/"+symbol_id,
                data : {'_token' : token},
                beforeSend:function(){
                    swal({text:"Please wait ...",showConfirmButton: false});
                },
                type : 'GET',
                dataType : 'json',
                success : function(result){
                    //console.log(result);  
                    var fine_weight_type = $("#fine_weight_type").val();
                    /* selling price */
                    if(fine_weight_type=="g"){
                        var tee_charge = parseFloat(result.tee/31.10350).toFixed(2);
                        var selling_base_price  = (parseFloat((result.eur_ask_price/31.10350).toFixed(2))+parseFloat(tee_charge))*$("#fine_weight").val();
                        //alert(selling_base_price); 
                    }else{
                        var tee_charge = result.tee;
                        var selling_base_price  = (result.eur_ask_price+parseFloat(tee_charge))*$("#fine_weight").val();
                    }
                    
                    var selling_base_price = parseFloat(selling_base_price).toFixed(2);  // fix float  selling_price_percentage_2
                    var vat_amount = (selling_base_price*$(".vat_rate").val())/100;
                    var selling_price_premium_percentage_val = $("#selling_price_premium_percentage").val();
                    var selling_price_premium_percentage = (selling_price_premium_percentage_val!='')?(selling_base_price*selling_price_premium_percentage_val)/100:'0';
                    var selling_price_premium_percentage = parseFloat(selling_price_premium_percentage).toFixed(2); // fix float
                    var selling_price_percentage_2 = $("#selling_price_percentage_2").val();
                    if($("#selling_price_percentage_2_type").val()=='%'){
                        var selling_price_percentage_2 = (selling_price_percentage_2!='')?(selling_base_price*selling_price_percentage_2)/100:'0';
                    }else if($("#selling_price_percentage_2_type").val()=='USD')
                    {
                        var selling_price_percentage_2 = (selling_price_percentage_2!='')?(selling_price_percentage_2*result.usd_to_eur_rate):'0';
                    }
                    var  final_selling_price = parseFloat(selling_base_price)+parseFloat(selling_price_premium_percentage)+parseFloat(selling_price_percentage_2)+parseFloat(vat_amount);
                    //alert(selling_price_premium_percentage);
                    

                    $("#selling_price").val(parseFloat(final_selling_price).toFixed(2));    
                    /* selling price */
                    
                    /* purchase price */
                    if(fine_weight_type=="g"){
                        var surcharge = (result.surcharge/31.10350);
                        var purchase_base_price  = ((result.eur_bid_price/31.10350)+surcharge)*$("#fine_weight").val();
                    }else{
                        var surcharge = result.surcharge;
                        var purchase_base_price  = ((result.eur_bid_price+surcharge)*$("#fine_weight").val());
                    }
                    var purchase_base_price = parseFloat(purchase_base_price).toFixed(2);  // fix float
                    var purchase_price_premium_percentage_val = $("#purchase_price_premium_percentage").val();
                    var purchase_price_premium_percentage = (purchase_price_premium_percentage_val!='')?(purchase_base_price*purchase_price_premium_percentage_val)/100:'0';
                    var purchase_price_premium_percentage = parseFloat(purchase_price_premium_percentage).toFixed(2); // fix float
                    var purchase_price_percentage_2 = $("#purchase_price_percentage_2").val(); 
                    if($("#purchase_price_percentage_2_type").val()=='%'){
                        var purchase_price_percentage_2 = (purchase_price_percentage_2!='')?(purchase_base_price*purchase_price_percentage_2)/100:'0';
                    }else if($("#purchase_price_percentage_2_type").val()=='USD')
                    {
                        var purchase_price_percentage_2 = (purchase_price_percentage_2!='')?(purchase_price_percentage_2*result.usd_to_eur_rate):'0';
                    }
                    var  final_purchase_price = parseFloat(purchase_base_price)+parseFloat(purchase_price_premium_percentage)+parseFloat(purchase_price_percentage_2);
                    $("#purchase_price").val(parseFloat(final_purchase_price).toFixed(2));  
                    /* purchase price */
                    swal.close();        
                }
            });
        }
        
<?php if(request()->route()->getActionName()=='App\Http\Controllers\ProductController@edit'){ ?>
        cal_price_data();
<?php } ?>
        <?php //echo request()->route()->getActionMethod(); //edit ?>
        <?php //echo request()->route()->getActionName(); //edit ?>
        
    </script>

    <script type="text/javascript">
        function show_price_tab(current_tab){
            $(".mytablink").removeClass("active");
            $("#"+current_tab).addClass("active");
            $(".custom_tab").hide();
            $(".custom_tab").removeClass('active').removeClass('show');
            $("."+current_tab).show();
        }
  </script>
    <!---Ask Price X  Fine weight + SELLING PRICE PREMIUM PERCENT + SELLING PRICE SURCHARGE 2 = SELLING PRICE (Green Wala)--->

    <!-- Bid Price X  Fine weight + PURCHASE PRICE PREMIUM PERCENT + PURHASE  PRICE SURCHARGE 2 = PURCHASE PRICE (RED Wala)-->
    <script>
function toggleCategory(ELEMENT)
{
    $(".custom_panel").hide("slow");
    $("#"+ELEMENT).slideToggle( "slow" );
}
</script>