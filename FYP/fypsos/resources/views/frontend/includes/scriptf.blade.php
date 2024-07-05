<script type="text/javascript" src="{{asset('frontasset/assets/js/jquery-min.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontasset/assets/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontasset/assets/js/material.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontasset/assets/js/material-kit.js')}}"></script>
    {{-- <script type="text/javascript" src="{{asset('frontasset/assets/js/color-switcher.js')}}"></script> --}}
    <script type="text/javascript" src="{{asset('frontasset/assets/js/jquery.parallax.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontasset/assets/js/owl.carousel.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontasset/assets/js/jquery.slicknav.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontasset/assets/js/main.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontasset/assets/js/jquery.counterup.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontasset/assets/js/waypoints.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontasset/assets/js/jasny-bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontasset/assets/js/bootstrap-select.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontasset/assets/js/form-validator.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontasset/assets/js/contact-form-script.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontasset/assets/js/jquery.themepunch.revolution.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontasset/assets/js/jquery.themepunch.tools.min.js')}}"></script>

    {{-- <script>
        $(document).ready(function() {
            $('#summernote').summernote({
              height: 250,                 // set editor height
              minHeight: null,             // set minimum height of editor
              maxHeight: null,             // set maximum height of editor
              focus: true                  // set focus to editable area after initializing summernote
            });
        });
      </script> --}}

<script>
    function previewFile(input){
        var file=$("input[type=file]").get(0).files[0];
        if(file)
        {
            var reader = new FileReader();
            reader.onload = function(){
                $('#previewImg').attr("src",reader.result);
            }
            reader.readAsDataURL(file);
        }
    }
  </script>




<script>
    // when country dropdown changes
    $('#country').change(function() {

        var countryID = $(this).val();

        if (countryID) {

            $.ajax({
                type: "GET",
                url: "{{ url('getState') }}?country_id=" + countryID,
                success: function(res) {

                    if (res) {

                        $("#state").empty();
                        $("#state").append('<option>Select State</option>');
                        $.each(res, function(key, value) {
                            $("#state").append('<option value="' + key + '">' + value +
                                '</option>');
                        });

                    } else {

                        $("#state").empty();
                    }
                }
            });
        } else {

            $("#state").empty();
            $("#city").empty();
        }
    });

    // when state dropdown changes
    $('#state').on('change', function() {

        var stateID = $(this).val();

        if (stateID) {

            $.ajax({
                type: "GET",
                url: "{{ url('getCity') }}?state_id=" + stateID,
                success: function(res) {

                    if (res) {
                        $("#city").empty();
                        $("#city").append('<option>Select City</option>');
                        $.each(res, function(key, value) {
                            $("#city").append('<option value="' + key + '">' + value +
                                '</option>');
                        });

                    } else {

                        $("#city").empty();
                    }
                }
            });
        } else {

            $("#city").empty();
        }
    });

</script>


  