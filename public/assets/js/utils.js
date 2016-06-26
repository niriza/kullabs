function is_function(funcName){
    if (typeof funcName == 'string' && eval('typeof ' + funcName) == 'function') {
        return true;
    }else{
        return false;
    }
}

function Cloner(iElem,iTarget,iDateFormat){
    //if($.browser.msie){//IE HAck
        //iElem = iElem.replace('#','');
        //this.template=innerXHTML(iElem);
    //}else{
        this.template=$(iElem).html();
   // }
    this.counter=1;
    this.targets=iTarget;
    if (iDateFormat != false) {
    	this.dateFormat = iDateFormat;
    }
    //Methods
    this.Clone = function(paramsClone){
        if (paramsClone == '#totalFld') {
            beforeTarget = paramsClone;
            paramsClone = null;
        } else 
            beforeTarget = '';
        //Debug Line
        if(paramsClone!=null) {
            paramsClone.unshift(this.counter);
        } else {
            var paramsClone = new Array;
            paramsClone[0] = this.counter;
        }
        var outputClone = $.format(this.template,paramsClone);
        if (beforeTarget == '#totalFld')
            $('#totalFld').before(outputClone);
        else
            $(outputClone).appendTo(this.targets);
        
        //alert(this.targets);
        this.counter++;
        if (iDateFormat != false) {
        	regDateBox(this.dateFormat);
        }	
    }
    this.CRemove = function(maxValue){
        if(maxValue==null){
            maxValue = 1;
        }
        if(this.counter>parseInt(maxValue)){
            this.counter--;
            $(this.targets+' tbody[class=clone]:last').remove();
        }
    }
    this.CRemoveAll = function(){
        $(this.targets+' tbody[class=clone]').remove();
        this.counter=1;
    }
}

function Combo(iUrl,iName){
    //Properties
    this.url = iUrl;
    this.options='<option value=>-----Select '+iName+'-----</option>';
    //this.optLen = 0;

    //Methods
    this.getList = function(){
        var itemList = getAjax(this.url);
        if(itemList){
            //this.optLen = itemList.length;
            for(var n = 0; n < itemList.length; n++){
                this.options += '<option value="'+ itemList[n].id +'">' + itemList[n].name + '</option>';
            }
        }
    }

    this.getList(); //Minor Construct

    this.setList = function(iTarget,iSelect){
        //alert(iTarget);//Debug Line
        $(iTarget).empty();
        if(iSelect==null){
            $(iTarget).html(this.options);
        }else{
            var newOptions = this.options.replace('<option value="'+ iSelect +'">','<option value="'+ iSelect +' " selected="selected" >');
            $(iTarget).html(newOptions);
        }
    //$(this.targets).attr('optLen',this.optLen);
    }
}

function regDateBox(dtFormat,dateBox){
    if(dtFormat==null){
        //dtFormat="dd-mm-yy";
        dtFormat="yy-mm-dd";
    }
    if(dateBox==null){
        
        dateBox="form .dateBox";
    }
    $(dateBox).datepicker({
        dateFormat:dtFormat,
        minDate:'-20Y',
        maxDate:'+20Y',
        changeMonth: true,
        changeYear: true,
        showButtonPanel: false,
        showAnim:'slideDown'
    });
}

function regDialog(){
    $('#results').dialog({
        bgiframe: true,
        title:'Task Status',
        width:320,
        height:240,
        modal: true,
        autoOpen:false,
        buttons: {
            Ok: function() {
                $(this).dialog('close');
                $('#results').empty();
            }
        }
    });
}

/*Ajaxify Non-Paged Validate as well [Form]-------------------*/
function AjaxForm(frm_name,resp_div){
    var subs = function(){
        var specialRequest = 0;
        if($('input[name=downloadTrue]').fieldValue()=="1"){
            specialRequest = 1;
        }
        if(specialRequest == 0){
            var options = {
                async:false,
                target: resp_div,
                resetForm:true,
                success: function(data){
                    $(resp_div).html(data);
                },
                error:function(){
                    $(frm_name).submit();
                }
            }
        $(frm_name).ajaxSubmit(options);
    }else{
        $(frm_name).submit();
    }
}
var v = $(frm_name).validate({
    onkeyup:false,
    onblur:false,
    submitHandler:subs
});

return v;
}

/*Ajaxify Modalify Validate as well [EDIT MODAL]-------------------*/
function AjaxModalForm(grid,frm_name,frm_div,title,mheight,mwidth){
    if(mheight==null){ // default height
        mheight=300;
    }
    if(mwidth==null){ //  default width
        mwidth=275;
    }

    //check if gridId has supplied grid or regular DIV
    checkGrid = function(){
        var idOnly = grid.replace('#','');
        return ($('#gbox_'+idOnly).length > 0)?true:false;
    }


    var reloadState = function (){
        var isGrid = checkGrid();

        $(frm_div).dialog('option', 'buttons', {
            "OK": function() {
                $(this).dialog('close');
            }
        });

        if(isGrid){
            $(grid).trigger("reloadGrid");
        }else{
            reloadView();
        }
        
    }
    var checker = function(){ //validate
        var v = $(frm_name).validate({
            onkeyup:false,
            onblur:false
        });
        if(v.form()){
            $(frm_div).dialog('option', 'buttons',{});
            $(frm_div).dialog('option', 'title','Task Status' );
            $(frm_div).html('Please Wait...');
            return true;
        }
        else{
            return false;
        }
    }
    $(frm_name).ajaxForm({
        target: frm_div,
        async:false,
        beforeSubmit:checker,
        success: reloadState,
        resetForm: true,
        clearForm:true
    });

    $(frm_div).dialog({
        bgiframe: true,
        autoOpen: false,
        height: mheight,
        width: mwidth,
        modal: true,
        close: function(){
            $(this).dialog('destroy');
        }
    });

    $(frm_div).dialog('option', 'title',title);

    $(frm_div).dialog('option', 'buttons', {
        "Cancel": function() {
            $(frm_div).dialog('close');
        },
        'Save': function() {
            $(frm_name).submit();
        }
    });
    $(frm_div).dialog('open'); //Modal Opener
    
}
/*---------------*/

/*-----------*/

/*Add * to required fields dynamically [* to Form]-------------------*/
function setAsterisk(formID){
    $(formID+' .required').each(function(key,element){
        //$('#'+element.id).parent().parent().find('label').append("<span class='red'>*</span>");
        //alert ($('#'+element.id));
        $('#'+element.id).closest('tr').find('label').append("<span class='red'>*</span>");
     
    });
}
/*--------------*/

/*Wizard View*/
function wizardView(id,parent){
    this.id = id;
    this.parent = parent;
    this.page = 1;
    this.total = $('.step', id).length;
    //Hide all page
    $('.step',id).hide();
    $('.step',id).each(function(index,step){
        $(step).attr('id','steps_'+(index+1));
       
    });

    //Show First Step
    $('#steps_1').show();
    $(id).show();
    $(parent).hide();

    this.manageBtn = function(){
        $('#pageView').html(this.page);
        $('#pageTotal').html(this.total);

        if(this.page==1){
            $('#backBtn').hide();
        }else{
            $('#backBtn').show();
        }
        if(this.page==this.total){
            $('#nextBtn').hide();
        }else{
            $('#nextBtn').show();
        }
    }

    this.manageBtn();

    //Go Step Up
    this.stepBack = function(){
        if(this.page>1){
            $('#steps_'+this.page).hide();
            $('#steps_'+(--this.page)).show();
        }
        this.manageBtn();
    }

    //Go Step Down
    this.stepNext = function(){
        if(this.page<this.total){
            $('#steps_'+this.page).hide();
            $('#steps_'+(++this.page)).show();
        }
        this.manageBtn();
    }

    //Close View
    this.Close = function(){
        //alert(this.id+'-'+this.parent);
        $(this.id).hide();
        $(this.parent).show();
    }


}

/*------------------*/


function strToDate(stin){
    if(stin!=null){
        var month = parseInt(stin.substring(0,2),10);
        var day = parseInt(stin.substring(3,5),10);
        var year = parseInt(stin.substring(6,10),10);
        var dateReturn = new Date();
        dateReturn.setFullYear(year);
        dateReturn.setMonth(month-1);
        dateReturn.setDate(day);
        return dateReturn;
    }
}

function roundNumber(num, dec) {
    var result = Math.round(num*Math.pow(10,dec))/Math.pow(10,dec);
    return result;
}

function safeLoadLink(linkSrc,container){
    $.ajax({
        url:linkSrc,
        dataType:'html',
        async:false,
        success:function(data){
            $('#'+container).html(data);
            return false;
        },
        error:function(){
            window.location = linkSrc;
            parent.window.location = linkSrc;
        }
    });
    return false;
}

/*-----------*/


/*function ajaxLoad(url,params,target,span){    
    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'html',
        data: params,
        timeout: 1000,
        success: function(response){
            if(response){
                alert('sdasd');
                /*if(confirm('Duplicate Entry, do you want to submit the form?')){
                    return true;
                }
            }
            /*alert(response);
            $(span).show();
            $(target).val(response);
        },
        error:function(){
            window.location = linkSrc;
            parent.window.location = linkSrc;
        }
    });
    return false;
}*/

function ajaxLoad(url,params,target,span){    
    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'html',
        data: params,
        timeout: 1000,
        success: function(response){
            alert('dsfwsf');
            $(span).show();
            $(target).val(response);
        }
    });
}


function autoLoad(url,params){
    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'html',
        data: params,
        timeout: 1000
    });
}

function ajaxLoadhtml(url,params,target,span){
    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'html',
        data: params,
        timeout: 1000,
        success: function(response){
            $(span).show();
            $(target).html(response);
        }
    });
}

function getCostDetailSubTotal(id,classname,mpctsn){   
    var subSum = 0;
    $('.'+classname+id).each(function(){
        var id = this.id;
        subIdArr = id.split("-");
        subId = subIdArr[0];
        //alert(subId);
        var val = parseFloat($('#'+id).val());

        if (isNaN(val)) {
            $('#'+id).val('');
            val = 0;
        }
        subSum = parseFloat(subSum+val);
        $('#sub-'+subId+'-'+mpctsn).html(subSum);

    });
}
function getActivitySubTotal(id,classname){
    var subSum = 0;
    $('.'+classname+id).each(function(){
        var id = this.id;
        subIdArr = id.split("-");
        subId = subIdArr[0];
        //alert(subId);
        var val = parseFloat($('#'+id).val());

        if (isNaN(val)) {
            $('#'+id).val('');
            val = 0;
        }
        subSum = parseFloat(subSum+val);
        $('#sub-'+subId).html(subSum);

    });
}

function getParentTotal(classname){
    var subSum = 0;
    $('.'+classname).each(function(){
        var id = this.id;
        var val = parseFloat($('#'+id).val());

        if (isNaN(val)) {
            $('#'+id).val('');
            val = 0;
        }
        subSum = parseFloat(subSum+val);
        $('#total-'+classname).html(subSum);

    });
}

function getTargetParentTotal(classname){
    var subSum = 0;
    $('.'+classname).each(function(){
        var id = this.id;
        var val = parseFloat($('#'+id).html());

        if (isNaN(val)) {
            $('#'+id).val('');
            val = 0;
        }
        subSum = parseFloat(subSum+val);
        $('#total-'+classname).html(subSum);

    });
}
    
function getCostSharingSubTotal(id){
    var subSum = 0;
    $('.calculateOverall'+id).each(function(){
        var id = this.id;
        subIdArr = id.split("-");
        subId = subIdArr[0];
        var val = parseFloat($('#'+id).val());

        if (isNaN(val)) {
            $('#'+id).val('');
            val = 0;
        }
        subSum = parseFloat(subSum+val);
        $('#sub-'+subId).html(subSum);

    });
}

function getGrandtotalindivisual(sourceId,destinationId,pactidd){
  var total = 0;
  var tempprevious = 1;
 var indsubtotal;
  $('.'+pactidd).each(function(){      
                var val = $('#'+this.id).val();
                
//                $tempmpctsn = explode('.', $pctval['mpct_sn']); ?>
                var tempmpctsn = val.split('.');
               
                if(tempmpctsn[1]){
                    indsubtotal = $('#'+sourceId+'-'+tempmpctsn[0]+'-'+tempmpctsn[1]).html();
                }
                else{
                    indsubtotal = $('#'+sourceId+'-'+tempmpctsn[0]+'-').html();
                }

               // alert(indsubtotal);
             // alert(tempmpctsn[0]+" = "+tempprevious);

                    if(tempmpctsn[0] == tempprevious)
                        {
                             if(indsubtotal != null )
                                {
                                     total  = parseInt(indsubtotal)+parseInt(total);
                                }
                        }
                    else
                        {
                           total = 0;
                           if(indsubtotal != null )
                            {
                                 total  = parseInt(indsubtotal)+parseInt(total);
                            }
                        }
                    //alert(indsubtotal+' = '+tempmpctsn[0]+" - "+tempprevious+" = "+total);

                tempprevious = tempmpctsn[0];
                $('#'+destinationId+'-'+tempmpctsn[0]).html(total);

            });
}