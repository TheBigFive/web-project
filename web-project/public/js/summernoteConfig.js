$(document).ready(function() {
              $('.summernote').summernote({
                height: 200,
                toolbar: [
                  // [groupName, [list of button]]
                  ['style', ['bold', 'italic', 'underline', 'clear']],
                  ['font', ['strikethrough', 'superscript', 'subscript']],
                  ['fontsize', ['fontsize']],
                  ['color', ['color']],
                  ['para', ['ul', 'ol', 'paragraph']],
                  ['height', ['height']],
                  ['insert',['link']]
                ],
                placeholder: 'Schrijf je tekst hier...'
              });
          });