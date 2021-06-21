Dropzone.options.backDesign = false;

Dropzone.options.backDesign = {
        paramName: "back_design",
        url: "/product/test",
        autoProcessQueue: false,
        maxFilesize: 2, // MB
        dictDefaultMessage:"<h3>طرح رو</h3><span>فایل خود را اینجا بکشید.</span>",
        dictInvalidFileType:"فرمت فایل معتبر نیست.",
        dictFileTooBig:"حجم عکس بیش از حد مجاز است.({{filesize}}) - حدمجاز: {{maxFilesize}}مگابایت",
        acceptedFiles: "image/*,application/pdf,.psd",
        maxFiles: 1,
        init: function() {
            this.on("addedfile", function() {
            if (this.files[1]!=null){
                this.removeFile(this.files[0]);
            }
            });
        },
        accept: function(file, done) {

        }
};

Dropzone.options.forwardDesign = {
        
        paramName: "forward_design",
        url: "/product/test",
        autoProcessQueue: false,
        dictDefaultMessage:"<h3>طرح پشت</h3><span>فایل خود را اینجا بکشید.</span>",
        dictInvalidFileType:"فرمت فایل معتبر نیست.",
        dictFileTooBig:"حجم عکس بیش از حد مجاز است.({{filesize}}) - حدمجاز: {{maxFilesize}}مگابایت",
        acceptedFiles: "image/*,application/pdf,.psd",
        maxFiles: 1,
        init: function() {
            this.on("addedfile", function() {
            if (this.files[1]!=null){
                this.removeFile(this.files[0]);
            }
            });
        },
        accept: function(file, done) {
            if (file.name == "justinbieber.jpg") {
            done("Naha, you don't.");
            }
            else { done(); }
        }
};


var inputs = document.querySelectorAll( '.inputfile' );
Array.prototype.forEach.call( inputs, function( input )
{
	var label	 = input.nextElementSibling,
		labelVal = label.innerHTML;

	input.addEventListener( 'change', function( e )
	{
		var fileName = '';
		if( this.files && this.files.length > 1 )
			fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
		else
			fileName = e.target.value.split( '\\' ).pop();

		if( fileName )
			label.querySelector( 'span' ).innerHTML = fileName;
		else
			label.innerHTML = labelVal;
	});
});


