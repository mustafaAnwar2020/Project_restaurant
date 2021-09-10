<div class="footer">
            <div class="wrapper">
                <p class="text-center">2020 All rights reserved, Food House.</p>
            </div>
        </div>
        <script src="<?php echo BURL;?>/js/jquery-3.4.1.min.js" ></script>
        <script src="<?php echo BURL;?>/js/popper.min.js" ></script>
        <script src="<?php echo BURL;?>/js/bootstrap.min.js" ></script>
        <script>
        $(".delete").click(function()
        {

          var item_id = $(this).attr("data-id");
          var table = $(this).attr("data-table");
          var field = $(this).attr("data-field");

            $.ajax({
              type:"GET",
              url:"<?php echo BURLA.'delete.php'; ?>",
              data:{item_id:item_id,table:table,field:field},
              dataType:"JSON",
              success:function(data)
              {
                  console.log(data.message);
                  if(data.message == "success")
                  {
                    alert("Deleted Success");
                  }
                  else 
                  {
                    alert("Error");
                  }
                  
              }
            })

        });
         </script>
    
    </body>