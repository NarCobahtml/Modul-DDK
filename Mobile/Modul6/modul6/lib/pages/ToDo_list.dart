import 'package:flutter/material.dart';
import 'package:modul6/pages/ToDo_detail.dart';
import '../models/ToDo.dart';
import '../service/http_service.dart';

class ToDoList extends StatefulWidget {
  @override
  _ToDoListState createState() => _ToDoListState();
}

class _ToDoListState extends State<ToDoList> {
  late List<ToDo> toDos = [];
  late HttpService service;

  Future initialize() async {
    var data = await service.getToDos();
    setState(() {
      toDos = data;
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
      appBar: AppBar(
        title: Text("ToDo List"),
        backgroundColor: Colors.blueAccent,
      ),
      body: toDos.isEmpty
          ? Center(child: CircularProgressIndicator())
          : ListView.builder(
              itemCount: toDos.length,
              itemBuilder: (context, i) {
                return Card(
                  color: Colors.blue[50],
                  margin: EdgeInsets.symmetric(horizontal: 12, vertical: 6),
                  elevation: 2,
                  child: ListTile(
                    title: Text(
                      toDos[i].title ?? '',
                      style: TextStyle(fontWeight: FontWeight.w500),
                    ),
                    subtitle: Text("ID: ${toDos[i].id}"),
                    onTap: () {
                      Navigator.push(
                        context,
                        MaterialPageRoute(builder: (_) => TodoDetail(toDos[i])),
                      );
                    },
                  ),
                );
              },
            ),
    );
  }
}
