import 'package:flutter/material.dart';
import 'package:modul_2/tugas/2.5.1.dart';
import 'package:modul_2/tugas/2.5.2.dart';
import 'package:modul_2/tugas/2.5.3.dart';
import 'package:modul_2/tugas/2.5.4.dart';
import 'package:modul_2/tugas/2.5.5.dart';
import 'package:modul_2/tugas/2.5.6.dart';
import 'package:modul_2/tugas/2.5.7.dart ';
import 'package:modul_2/tugas/2.5.8.dart';
import 'package:modul_2/tugas/2.6.1.1.dart';
import 'package:modul_2/tugas/2.6.1.2.dart';
import 'package:modul_2/tugas/2.6.1.3.dart';
import 'package:modul_2/tugas/2.6.1.4.dart';
import 'package:modul_2/tugas/2.6.1.5.dart';
import 'package:modul_2/tugas/2.6.1.6.dart';
import 'package:modul_2/tugas/2.6.1.7.dart';
import 'package:modul_2/tugas/2.6.1.8.dart';
import 'package:modul_2/tugas/2.6.2.1.dart';
import 'package:modul_2/tugas/2.6.2.2.dart';
import 'package:modul_2/tugas/2.6.3.dart';
import 'package:modul_2/tugas/2.6.4.dart';
import 'package:modul_2/tugas/2.6.5.dart';
import 'package:modul_2/tugas/2.7mandiri.dart';

void main() {
  runApp(MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return const MaterialApp(
      debugShowCheckedModeBanner: false,
      home: TugasMandiri(),
    );
  }
}
