
      <script>
         $('.btn').click(function(){
           $(this).toggleClass("click");
           $('.sidebar').toggleClass("show");
         });
           $('.feat-btn').click(function(){
             $('nav ul .feat-show').toggleClass("show");
             $('nav ul .first').toggleClass("rotate");
           });
           $('.serv-btn').click(function(){
             $('nav ul .serv-show').toggleClass("show1");
             $('nav ul .second').toggleClass("rotate");
           });
           $('.pend-btn').click(function(){
             $('nav ul .pend-show').toggleClass("show2");
             $('nav ul .third').toggleClass("rotate");
           });
           $('.lap-btn').click(function(){
             $('nav ul .lap-show').toggleClass("show3");
             $('nav ul .fourth').toggleClass("rotate");
           });
           $('nav ul li').click(function(){
             $(this).addClass("active").siblings().removeClass("active");
           });
      </script>
</body>
</html>
