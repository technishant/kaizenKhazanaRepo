$(document).ready(function(){
   $('#kaizen-type-dropdown').change(function(){
       var selected = $('#kaizen-type-dropdown').val();
       if(selected == 0) {
           $('.hideFields').removeClass('hidden');
           $('.showFields').addClass('hidden');
       } else {
           $('.hideFields').addClass('hidden');
           $('.showFields').removeClass('hidden');
       }
   })
});