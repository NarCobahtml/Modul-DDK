import 'package:flutter/material.dart';
import 'input.dart';
import 'result.dart';
import 'convert.dart';

void main() {
  runApp(MyApp());
}

class MyApp extends StatefulWidget {
  @override
  State<MyApp> createState() => _MyAppState();
}

class _MyAppState extends State<MyApp> {
  double _inputUser = 0;
  double _kelvin = 0;
  double _reamur = 0;

  final TextEditingController _Input = TextEditingController();

  void _konversiSuhu() {
    setState(() {
      _inputUser = double.tryParse(_Input.text) ?? 0;
      _kelvin = _inputUser + 273.15;
      _reamur = _inputUser * 0.8;
    });
  }

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Flutter Demo',
      theme: ThemeData(
        primarySwatch: Colors.blue,
        visualDensity: VisualDensity.adaptivePlatformDensity,
      ),
      home: Scaffold(
        appBar: AppBar(title: Text("Konverter Suhu")),
        body: Container(
          margin: EdgeInsets.all(8),
          child: Column(
            children: [
              Input(etInput: _Input),
              Spacer(),
              Row(
                mainAxisAlignment: MainAxisAlignment.spaceEvenly,
                children: [
                  Result(namaKonversi: "Suhu dalam Kelvin", hasil: _kelvin),
                  Result(namaKonversi: "Suhu dalam Reamur", hasil: _reamur),
                ],
              ),
              Spacer(),
              Convert(konvertHandler: _konversiSuhu),
            ],
          ),
        ),
      ),
    );
  }
}
