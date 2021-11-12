(function($){
    $().ready(function(){

      //validate function

      function validate(msg,type='danger'){
        return `<p class="alert alert-${type}">${msg} ! <button class="close" data-dismiss="alert">&times;</button></p>`;
      }

      //student data show

      function studentData(){
        $.ajax({
          url:"get-students",
          success:function(data){
           $('#student_data').html(data);

          }
        });
      }
      studentData();




        //student modal show
      $('#student_add_btn').click(function(e){
          e.preventDefault();

            $('#student_add_modal').modal('show');
      }); 

      //student form submit
      $('#student_form').submit(function(e){
        e.preventDefault();
        let name = $('#student_form input[name="name"]').val();
        let email = $('#student_form input[name="email"]').val(); 
        let cell = $('#student_form input[name="cell"]').val(); 

        if(name == '' || email == '' || cell == ''){
          $('.msg').html(validate('All fields are required'));
        }else{
        
          $.ajax({
            url:"student",
            method:"POST",
            data: new FormData(this),
            contentType:false,
            processData:false,
            success: function (data){
             
              if(data==true){
                $('#student_form')[0].reset();
                $('#student_add_modal').modal('hide');
                swal("Success!", "New Student added Successfull!", "success", {
                   
                });
                
                studentData();
              }else{
                 swal ('Woring data');
              }

            }
            
          });


        }


      });

    //delete student data

 $(document).on('click','#delete_id', function(e){
  e.preventDefault();
  let id = $(this).attr('delete_id');
  
  $.ajax({
    url:'delete-student/' + id,
    success:function(data){
      studentData();
      swal("Success!", data + " Data Delete Successfull!", "success");
                   
      
    }
  });

 });

 //show single student

 $(document).on('click','.show-student',function(e){
  e.preventDefault();
  let id =$(this).attr('student_id');
  
  

  $.ajax({
    url:'student/'+id,
    success:function(data){
      $('#student_show_modal img').attr('src','storage/student/'+ data.photo);
      $('#student_show_modal span#sname').html(data.name);
      $('#student_show_modal span#semail').html(data.email);
      $('#student_show_modal span#scell').html(data.cell);
     

      $('#student_show_modal').modal('show');
    }
  });


 });

 


    });
})(jQuery)