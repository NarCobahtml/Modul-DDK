import 'package:flutter/material.dart';
import 'package:modul5/pages/movie_detail.dart';
import 'package:modul5/service/http_service.dart';

class MovieList extends StatefulWidget {
  const MovieList({super.key});

  @override
  _MovieListState createState() => _MovieListState();
}

class _MovieListState extends State<MovieList> {
  List movies = [];
  late HttpService service;
  final String imgPath = 'https://image.tmdb.org/t/p/w200';

  Future initialize() async {
    var data = await service.getPopularMovies();
    setState(() {
      movies = data;
    });
  }

  @override
  void initState() {
    service = HttpService();
    initialize();
    super.initState();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('Popular Movies')),
      body: movies.isEmpty
          ? const Center(child: CircularProgressIndicator())
          : ListView.builder(
              itemCount: movies.length,
              itemBuilder: (context, i) {
                var movie = movies[i];
                String image = movie.posterPath != null
                    ? imgPath + movie.posterPath
                    : '';

                return Card(
                  margin: const EdgeInsets.all(8),
                  shape: RoundedRectangleBorder(
                    borderRadius: BorderRadius.circular(10),
                  ),
                  child: ListTile(
                    leading: image != ''
                        ? Image.network(image, width: 50, fit: BoxFit.cover)
                        : const Icon(Icons.movie),
                    title: Text(movie.title),
                    subtitle: Text('Rating: ${movie.voteAverage}'),
                    onTap: () {
                      Navigator.push(
                        context,
                        MaterialPageRoute(builder: (_) => MovieDetail(movie)),
                      );
                    },
                  ),
                );
              },
            ),
    );
  }
}
