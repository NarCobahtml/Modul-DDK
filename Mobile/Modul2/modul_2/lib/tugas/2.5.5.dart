import 'package:flutter/material.dart';

class Tugas5 extends StatelessWidget {
  const Tugas5({super.key});
  final int _count = 0;
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      home: Scaffold(
        appBar: AppBar(title: Text('Sample Code')),
        body: Center(child: Text('You have pressed the button $_count times.')),
        bottomNavigationBar: BottomAppBar(
          child: Container(height: 50, child: Container(height: 50)),
        ),
        floatingActionButton: FloatingActionButton(
          onPressed: () => 0,
          tooltip: 'Increment Counter',
          child: Icon(Icons.add),
        ),
        floatingActionButtonLocation: FloatingActionButtonLocation.centerDocked,
      ),
    );
  }
}
