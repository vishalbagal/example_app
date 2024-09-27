// var parentIndustryId = $('#industry_name').val();
// console.log(parentIndustryId);


$('#industry_name').on('change',function(){
    var parentIndustryId = $('#industry_name').val();
    // console.log(parentIndustryId);
    console.log('parentIndustryId'+parentIndustryId+" --- "+$("#sub_industry_name option").hasClass(parentIndustryId));
    if($('#sub_industry_name option').hasClass(parentIndustryId))
    {
        $("#sub_industry_name").removeAttr("disabled");
        $("#sub_industry_name option").removeClass("hide");
        $("#sub_industry_name option").not($("#sub_industry_name option."+parentIndustryId)).addClass("hide");
    }
    else{
        $("#sub_industry_name").attr("disabled","true");
        $("#sub_industry_name option").removeClass("hide");
    }
});

/* var uploadcvLogo = {
    cvLogo:function(){
        if($('#')){

        }
    }
} */


    var uploadcvLogo = {
        cvLogo: function(){
            const fileInput = $("#cv_logo")[0];
            const previewImg = $("#cv_logo_preview");

            if (fileInput.files && fileInput.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImg.attr('src', e.target.result).removeClass('hide');
                    $(".noImg").addClass("hide");
                }
                reader.readAsDataURL(fileInput.files[0]);
            }
        },
        removecvLogo: function(){
            $("#cv_logo_preview").attr("src", "").addClass("hide");
            $(".noImg").removeClass("hide");
        }
    }

/* $('#industry_name').on('change',function(){
    var parentIndustryId = $('#industry_name').val();
    // console.log(parentIndustryId);
    console.log('parentIndustryId'+parentIndustryId+" --- "+$("#sub_industry_name option").hasClass(parentIndustryId));
    if($('#sub_industry_name option').hasClass(parentIndustryId))
    {
        // $("#sub_industry_name option").removeAttr("selected");
        $("#sub_industry_name").removeAttr("disabled");
        $("#sub_industry_name option").removeClass("hide");
        $("#sub_industry_name option").not($("#sub_industry_name option."+parentIndustryId)).addClass("hide");
    }
    else{
        // $("#sub_industry_name option").removeAttr("selected");
        $("#sub_industry_name").attr("disabled","true");
        $("#sub_industry_name option").removeClass("hide");
    }
}); */
