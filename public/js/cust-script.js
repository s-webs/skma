const uploadButton = document.querySelector('.upload-button');
const imagesInput = document.querySelector( 'input[name=images]' );

if (uploadButton) {
    uploadButton.addEventListener('click', (e) => {
        e.preventDefault();

        openPopup();
    });
}

function openPopup() {
    CKFinder.popup( {
        chooseFiles: true,
        onInit: function( finder ) {
            finder.on( 'files:choose', function( evt ) {
                var file = evt.data.files.first();
                imagesInput.value = file.getUrl();
            } );
            finder.on( 'file:choose:resizedImage', function( evt ) {
                imagesInput.value = evt.data.resizedUrl;
            } );
        }
    } );
}
