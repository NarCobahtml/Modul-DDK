import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'page/navbar.dart';

void main() {
  Get.put(HomeController());
  runApp(
    GetMaterialApp(
      title: "Modul 8 GetX",
      debugShowCheckedModeBanner: false,
      theme: ThemeData(
        primarySwatch: Colors.orange,
        scaffoldBackgroundColor: const Color(0xFF110E33),
        fontFamily: 'PlusJakarta',
      ),
      home: const HomePage(),
    ),
  );
}
