import 'package:flutter/material.dart';

class Convert extends StatelessWidget {
  final Function konvertHandler;

  const Convert({Key? key, required this.konvertHandler}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return SizedBox(
      width: double.infinity,
      child: ElevatedButton(
        onPressed: () => konvertHandler(),
        style: ElevatedButton.styleFrom(
          backgroundColor: Colors.blue,
          disabledBackgroundColor: Colors.blue,
          shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(0)),
        ),
        child: Text("Konversi Suhu", style: TextStyle(color: Colors.white)),
      ),
    );
  }
}
