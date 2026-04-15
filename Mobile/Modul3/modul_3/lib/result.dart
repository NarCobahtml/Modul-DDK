import 'package:flutter/material.dart';

class Result extends StatelessWidget {
  final String namaKonversi;
  final double hasil;

  const Result({Key? key, required this.namaKonversi, required this.hasil})
    : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Column(
      children: [
        Text(namaKonversi, style: TextStyle(fontSize: 18)),
        Text(
          hasil.toStringAsFixed(2),
          style: TextStyle(fontSize: 48, fontWeight: FontWeight.bold),
        ),
      ],
    );
  }
}
