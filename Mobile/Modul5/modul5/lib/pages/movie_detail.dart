import 'package:flutter/material.dart';
import 'package:modul5/models/movie.dart';

class MovieDetail extends StatelessWidget {
  final Movie movie;
  final String imgPath = 'https://image.tmdb.org/t/p/w500';

  MovieDetail(this.movie);

  @override
  Widget build(BuildContext context) {
    String path = movie.posterPath != null && movie.posterPath.isNotEmpty
        ? imgPath + movie.posterPath
        : '';

    return Scaffold(
      appBar: AppBar(title: Text(movie.title)),
      body: SingleChildScrollView(
        child: Column(
          children: [
            if (path != '')
              Image.network(path, height: 300, fit: BoxFit.cover)
            else
              const Icon(Icons.movie, size: 100),

            Padding(
              padding: const EdgeInsets.all(16),
              child: Column(
                children: [
                  Row(
                    mainAxisAlignment: MainAxisAlignment.center,
                    children: [
                      Icon(Icons.star, color: Colors.amber),
                      SizedBox(width: 6),
                      Text(
                        movie.voteAverage.toString(),
                        style: const TextStyle(fontSize: 16),
                      ),
                    ],
                  ),
                  const SizedBox(height: 10),
                  Text(movie.overview, textAlign: TextAlign.justify),
                ],
              ),
            ),
          ],
        ),
      ),
    );
  }
}
