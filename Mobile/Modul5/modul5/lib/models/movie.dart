class Movie {
  int id = 0;
  String title = '';
  double voteAverage = 0.0;
  String overview = '';
  String posterPath = '';

  Movie(this.id, this.title, this.voteAverage, this.overview, this.posterPath);

  Movie.fromJson(Map<String, dynamic> parsedJson) {
    id = parsedJson['id'] ?? 0;
    title = parsedJson['title'] ?? '';
    voteAverage = (parsedJson['vote_average'] ?? 0) * 1.0;
    overview = parsedJson['overview'] ?? '';
    posterPath = parsedJson['poster_path'] ?? '';
  }
}
