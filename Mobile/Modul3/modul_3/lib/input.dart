import 'package:flutter/material.dart';
import 'package:flutter/services.dart';

class Input extends StatelessWidget {
  final TextEditingController etInput;

  const Input({Key? key, required this.etInput}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return TextFormField(
      controller: etInput,
      decoration: InputDecoration(hintText: "Masukkan Suhu Dalam Celcius"),
      keyboardType: TextInputType.number,
      inputFormatters: [FilteringTextInputFormatter.digitsOnly],
    );
  }
}
