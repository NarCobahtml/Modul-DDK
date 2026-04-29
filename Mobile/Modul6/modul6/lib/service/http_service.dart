import 'package:http/http.dart' as http;
import 'dart:convert';
import 'dart:io';
import 'package:modul6/models/ToDo.dart';

class HttpService {
  final String baseUrl = 'https://jsonplaceholder.typicode.com/todos';

  Future<List<ToDo>> getToDos() async {
    final String uri = baseUrl;

    http.Response result = await http.get(Uri.parse(uri));
    if (result.statusCode == HttpStatus.ok) {
      final jsonResponse = jsonDecode(result.body);
      List<ToDo> toDos = jsonResponse.map<ToDo>((i) => ToDo.fromJson(i)).toList();
      return toDos;
    } else {
      print("Fail");
      return List.empty();
    }
  }
}
