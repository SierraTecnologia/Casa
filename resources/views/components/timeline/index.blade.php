@extends('layouts.app')

@section('pageTitle') Dashboard @stop

@section('content')

<div id="timelinecontent">
<vue-timeline-update></vue-timeline-update>
  <!-- <template> -->
    <!-- Latest update -->
    <vue-timeline-update
      :date="new Date('2017-02-26')"
      title="v2.2.0 - Initial D"
      description="Today I am thrilled to announce the release of Vue.js 2.2.0."
      thumbnail="/images/vuetimeline/initial_d.jpg"
      category="announcement"
      icon="code"
      color="red"
    />
  
    <!-- Another update -->
    <vue-timeline-update
      :date="new Date('2016-11-22')"
      title="v2.1.0 - Hunter X Hunter"
      description="Today I am thrilled to announce the release of Vue.js 2.1.0."
      thumbnail="/images/vuetimeline/hunter_x_hunter.jpg"
      category="announcement"
      icon="code"
      color="turquoise"
    />
  
    <!-- Yet another update -->
    <vue-timeline-update
      :date="new Date('2016-09-30')"
      title="v2.0.0 - Ghost in the Shell"
      description="Today I am thrilled to announce the release of Vue.js 2.0.0"
      thumbnail="/images/vuetimeline/ghost_in_the_shell.jpg"
      category="announcement"
      icon="code"
      color="white"
      is-last
    />
  <!-- </template> -->
<div>


@stop

@section('scripts')

<script>
new Vue({
  el: '#timelinecontent',
  data: function () {
    return {
      images: {!! json_encode($registros->map(function($registro) {
        return [
          'title' => $registro->latitude,
          'href' => $registro->latitude,
          'type' => 'image/jpeg',
          'poster' => $registro->latitude
        ];
      })) !!},
      // [
      //   {
      //     title: 'A YouYube video',
      //     href: 'https://www.youtube.com/watch?v=hNdlUHBJDKs',
      //     type: 'text/html',
      //     youtube: 'hNdlUHBJDKs',
      //     poster: 'https://img.youtube.com/vi/hNdlUHBJDKs/maxresdefault.jpg'
      //   },
      //   {
      //     title: 'A YouYube video 2',
      //     href: 'https://www.youtube.com/watch?v=s5iUsaPPtnk',
      //     type: 'text/html',
      //     youtube: 's5iUsaPPtnk',
      //     poster: 'https://img.youtube.com/vi/s5iUsaPPtnk/maxresdefault.jpg'
      //   },
      //   {
      //     title: 'Image',
      //     href: 'https://dummyimage.com/1600/ffffff/000000',
      //     type: 'image/jpeg',
      //     poster: 'https://dummyimage.com/350/ffffff/000000'
      // 	}
      // ],
      index: null
    };
  },

  components: {
    'vue-timeline-update': vuetimeline
  }
});
</script>
@endsection
