<?php
    require_once ('../includes/header.php');

	require_once '../includes/db.php';

	require_once '../Controllers/brandingController.php';

	$db = new DBController();

	$conn = $db->connect();

	$dCtrl  =	new BrandingController($conn);

	$brands = $dCtrl->index();
?>
    <div class="container">
        <div class="row justify-content-center" style="margin-top: 20px;">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Branding
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-outline-primary float-end" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            Add
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Note The Password</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="brandInsertForm">
                                            <div class="form-group">
                                           
                                                <input type="text" class="form-control" id="account_name" name="account_name" placeholder="Account Name" autofocus autocomplete="Name">
                                               
                                            </div>
                                            <div class="form-group">
                                               
                                                <input type="text" class="form-control" id="url" name="url" placeholder="Account URL"  autocomplete="URL">
                                            </div>
                                            <div class="form-group">
                                            
                                                
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Registered Name" autofocus autocomplete="Name">
                                            </div>
                                            <div class="form-group">
                                            
                                                
                                                <input type="text" class="form-control" id="email" name="email" placeholder="Registered Email" autofocus autocomplete="Name">
                                            </div>
                                            <div class="form-group">
                                            
                                           
                                            <input type="text" class="form-control" id="password" name="password" placeholder="Account Password" autofocus autocomplete="Name">
                                        </div>
                                        <div class="form-group">
                                            
                                           
                                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Registered Phone" autofocus autocomplete="Name">
                                        </div>
                                        <div class="form-group">
                                            
                                           
                                            <input type="text" class="form-control" id="username" name="username" placeholder="Registered Username" autofocus autocomplete="Name">
                                        </div>
                                        <div class="form-group">
                                            
                                            
                                            <textarea class="form-control" id="key_questions" name="key_questions" cols="10" rows="10" placeholder="Account Security Questions"></textarea>
                                          
                                        </div>
                                            <div class="form-group">
                                                <label for="b_name">Registration Date</label>
                                                <input type="datetime-local" class="form-control" id="reg_date" name="reg_date" placeholder="Registration Date">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="hidden" id="bid" name="bid" />
                                        <button type="button" class="btn btn-secondary editbrand" data-bs-dismiss="modal" id="editBrand" >Close</button>
                                        <button type="button" class="btn btn-primary" name="saveBrand" id="saveBrand"> Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-hovered table-striped" id="productTable">
                            <thead>
                            <th>  ID </th>
                            <th> Account Name </th>
                            <th> Account URL </th>
                            <th> Registered Name </th>
                            <th> Registered Email </th>
                            <th> Registered Password </th>
                            <th> Registered Username </th>
                            <th> Security Questions </th>
                            <th> Actions </th>
                            </thead>

                            <tbody>
                            
                            <?php
                            foreach($brands as $brand) : 
                            $i=1;
                            ?>

                                <tr>
                                    <td id="b_id"> <?php echo $i++; ?> </td>
                                    <td> <?php echo $brand['account_name']; ?> </td>
                                    <td> <?php echo $brand['url']; ?> </td>
                                    <td> <?php echo $brand['name']; ?> </td>
                                    <td> <?php echo $brand['email']; ?> </td>
                                    <td> <?php echo $brand['password']; ?> </td>
                                    <td> <?php echo $brand['phone']; ?> </td>
                                    <td> <?php echo $brand['username']; ?> </td>
                                    <td> <?php echo $brand['key_questions']; ?> </td>
                                    <td> <button  id="<?php echo $brand['id'];?>" class="btn btn-info update"><i class="fa fa-edit"></i></button>
                                        <button  id="<?php echo $brand['id'];?>"  class="btn btn-danger delete"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>


                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
require_once ('../includes/footer.php');
?>
<script>



    $(document).ready(function() {
        $('#productTable').DataTable();

        $('#saveBrand').click(function () {
            var account_name = $('#account_name').val();
            var url = $('#url').val();
            var name = $('#name').val();
            var email = $('#email').val();
            var password = $('#password').val();
            var phone = $('#phone').val();
            var username = $('#username').val();
            var key_questions = $('#key_questions').val();
            var reg_date = $('#reg_date').val();
            var dataString = "account_name="+account_name+ "&url="+url+"&name="+name+ "&email="+email+"&password="+password+"&phone="+phone+"&username="+username+"&key_questions="+key_questions+"&reg_date="+reg_date;
            try{
                if(account_name =='' || url =='')
                {
                    alert('Please Fill the Fields');
                }
                else
                {
                    $.ajax({
                        type:'post',
                        url:'../branding/insert.php',
                        data:dataString,
                        cache:false,
                        success:function (data) {
                            $('#brandInsertForm')[0].reset();
                            $('#staticBackdrop').modal('hide');
                            alert(data);
                        }
                    })
                }
            }
            catch (e) {
                alert(e.message);
            }
        });
$(document).on('click','.update',function () {
    var brand_id = $(this).attr('id');
    $.ajax({
        type:'post',
        url:'fetch-single.php',
        data:{brand_id:brand_id},
        success:function (data) {
           $('#staticBackdrop').modal('show');
           data = jQuery.parseJSON(data);
           $('#b_name').val(data.b_name);
           $('#b_url').val(data.b_url);
           $('#b_date').val(data.b_reg_date);
           $('#bid').val(data.b_id);
           $('.modal-title').text('Edit Brand');
           $('#saveBrand').addClass('disabled btn-warning');
           $('#saveBrand').attr('type','hidden');
            $('.editbrand').attr('data-bs-dismiss','');
            $('.editbrand').text('Update Data');
            $('.editbrand').attr('id','editBrand')
           $('#saveBrand').text('Disabled Button');

        }
    })
});

    $('#editBrand').click(function () {
        var eb_id = $('#bid').val();
        var eb_name = $('#b_name').val();
        var eb_url = $('#b_url').val();
        var eb_date = $('#b_date').val();
        var edit_data = "eb_id=" + eb_id + "&eb_name=" + eb_name + "&eb_url=" + eb_url + "&eb_date=" + eb_date;
        $.ajax({
            type: 'post',
            url: 'update-brand.php',
            data: edit_data,
            cache: false,

            success: function (data) {
                alert(data);
                //setInterval('refresh()', 100);
            }

        })
    });
$(document).on('click','.delete',function () {
    var brand = $(this).attr('id');
    if(confirm("Are you sure you want to delete this?")) {
        $.ajax({
            type: 'post',
            url: 'delete.php',
            data: {brand: brand},
            success: function (data) {
                alert(data);
               // setInterval('refresh()', 100);
            }
        });
    }
});
    });
        
    function refresh() {
        location.reload(true);
    }
</script>
