$(document).ready(function () {
    // Preview image when file is selected
    $('#img_product').change(function (e) {
        if (this.files && this.files[0]) {
            const reader = new FileReader();

            reader.onload = function (e) {
                $('#img_upload').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
});
// Image preview functionality
document.addEventListener('DOMContentLoaded', function() {
    const imgInput = document.getElementById('img_product');
    const currentImage = document.querySelector('.current-image');
    
    imgInput.addEventListener('change', function(e) {
        if (e.target.files && e.target.files[0]) {
            const reader = new FileReader();
            
            reader.onload = function(event) {
                currentImage.src = event.target.result;
                
                // Show animation when image changes
                currentImage.style.transform = 'scale(0.95)';
                currentImage.style.transition = 'transform 0.3s ease';
                
                setTimeout(() => {
                    currentImage.style.transform = 'scale(1)';
                }, 300);
            }
            
            reader.readAsDataURL(e.target.files[0]);
        }
    });
    
    // Optional: Click on image to trigger file input
    currentImage.addEventListener('click', function() {
        imgInput.click();
    });
    
    // Show file name when selected
    imgInput.addEventListener('change', function() {
        const fileName = this.files[0]?.name || 'No file chosen';
        const label = document.createElement('span');
        label.className = 'file-name ms-2 text-muted';
        label.textContent = fileName;
        
        // Remove previous file name if exists
        const existingLabel = this.parentNode.querySelector('.file-name');
        if (existingLabel) {
            existingLabel.remove();
        }
        
        this.parentNode.appendChild(label);
    });
});