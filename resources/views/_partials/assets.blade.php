<!-- Load only common css -->
{{ Html::style('packages/bootstrap/css/bootstrap.min.css') }}
{{ Html::style('https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css') }}
{{ Html::style('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}
{{ Html::style('css/AdminLTE.min.css') }}
{{ Html::style('css/skins/_all-skins.min.css') }}

<!-- load only common js -->
<script type="text/javascript">var base_url = "{{ URL::to('/').'/'}}";</script>
{{ Html::script('packages/jQuery/jQuery-2.1.4.min.js') }}
{{ Html::script('packages/bootstrap/js/bootstrap.min.js') }}
{{ Html::script('packages//fastclick/fastclick.min.js') }}
{{ Html::script('js/app.min.js') }}
{{ Html::script('assets/js/jquery-migrate-1.2.1.min.js') }}