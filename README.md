import 'dart:developer';

import 'package:flutter/material.dart';
import 'package:mid2/drawer.dart';
import 'package:mid2/showdata.dart';

List<userData> GlobelList = [];

class FormDataEx extends StatefulWidget {
  final int? updateIndex;
  FormDataEx({super.key, this.updateIndex});

  @override
  State<FormDataEx> createState() => _FormDataExState();
}

class _FormDataExState extends State<FormDataEx> {
  TextEditingController name = TextEditingController();
  TextEditingController email = TextEditingController();
  // TextEditingController number = TextEditingController();

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Add Form'),
        backgroundColor: Colors.brown,
      ),
      body: Column(
        children: [
          TextField(
            controller: name,
            decoration: InputDecoration(label: Text('name')),
          ),
          TextField(
            controller: email,
            decoration: InputDecoration(label: Text('email')),
          ),
          // TextField(
          //   controller: number,
          //   decoration: InputDecoration(label: Text('number')),
          // ),
          SizedBox(height: 20),
          ElevatedButton(
              onPressed: () {
                setState(() {
                  GlobelList.add(userData(name: name.text, email: email.text));
                  // log(GlobelList.map((e) => e.name).toString());
                  log(GlobelList.map((e) => e.name).toString());
                });
              },
              child: Text('INSERT')),
          SizedBox(
            height: 20,
          ),
          ElevatedButton(
              onPressed: () {
                setState(() {
                  updateUser(widget.updateIndex ?? 0,
                      userData(name: name.text, email: email.text));
                  // log(GlobelList[0].name);
                });
              },
              child: Text('UPDATE')),
        ],
      ),
    );
  }
}

// Update user data
void updateUser(int index, userData updatedUser) {
  if (index >= 0 && index < GlobelList.length) {
    GlobelList[index] = updatedUser;
  }
}

// Model class
class userData {
  String name;
  String email;
  // String number;
  userData({
    required this.name,
    required this.email,
    // required this.number,
  });
}



==========================================

import 'package:flutter/material.dart';
import 'package:mid2/form.dart';

class showData extends StatefulWidget {
  const showData({super.key});

  @override
  State<showData> createState() => _showDataState();
}

class _showDataState extends State<showData> {
  @override
  Widget build(BuildContext context) {
    setState(() {});
    return Scaffold(
      appBar: AppBar(
        title: Text('show data'),
        backgroundColor: Colors.blueGrey,
      ),
      body: ListView.builder(
        itemCount: GlobelList.length,
        itemBuilder: (context, index) {
          return Container(
            // color: Colors.greenAccent,
            child: ListTile(
              leading: Icon(Icons.person),
              tileColor: Colors.deepPurple,
              title: Text(GlobelList[index].name),
              subtitle: Text(GlobelList[index].email),
              trailing: Row(
                mainAxisSize: MainAxisSize.min,
                children: [
                  IconButton(
                    icon: Icon(Icons.edit),
                    onPressed: () {
                      setState(
                        () {
                          Navigator.push(
                            context,
                            MaterialPageRoute(
                              builder: (context) => FormDataEx(
                                updateIndex: 0,
                              ),
                            ),
                          );
                        },
                      );
                    },
                  ),
                  IconButton(
                    icon: Icon(Icons.delete),
                    onPressed: () {
                      setState(() {
                        GlobelList.removeAt(index);
                      });
                    },
                  ),
                ],
              ),
            ),
          );
        },
      ),
    );
  }
}

//       body: ListView.builder(
//         itemCount: GlobelList.length,
//         itemBuilder: (context, index) {
//           return Container(
//             child: ListTile(
//               leading: Icon(Icons.person),
//               title: Text(GlobelList[index].name),
//               subtitle: Text(GlobelList[index].email),
//               trailing: Row(
//                 mainAxisSize: MainAxisSize.min,
//                 children: [
//                   IconButton(
//                     icon: Icon(Icons.edit),
//                     onPressed: () {
//                       setState(
//                         () {
//                           Navigator.push(
//                             context,
//                             MaterialPageRoute(
//                               builder: (context) => FormDataEx(
//                                 updateIndex: 0,
//                               ),
//                             ),
//                           );
//                         },
//                       );
//                     },
//                   ),
//
//                   IconButton(
//                     icon: Icon(Icons.delete),
//                     onPressed: () {
//                       setState(() {
//                         GlobelList.removeAt(index);
//                       });
//                     },
//                   ),
//                 ],
//               ),
//             ),
//           );
//         },
//       ),


==============

class _HomePageState extends State<HomePage> {
  int SelectIndex = 0;
  List student = [page1(),page2(),page3()];

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      bottomNavigationBar: BottomNavigationBar(
        currentIndex: SelectIndex,
        selectedItemColor: Colors.blue,
        onTap: (value) {
          setState(() {
            SelectIndex = value;
          });
        },
        items: [
          BottomNavigationBarItem(
            icon: Icon(Icons.message),
            label: 'Message',
          ),
          BottomNavigationBarItem(
            icon: Icon(Icons.home),
            label: 'Home',
          ),
          BottomNavigationBarItem(
            icon: Icon(Icons.search),
            label: 'Search',
          ),
        ],
      ),
      body: student[SelectIndex],


===========================================================

     drawer: Drawer(
        backgroundColor: Colors.white60,
        child: ListView(
          children: [
            UserAccountsDrawerHeader(
                accountName: Text('data'), accountEmail: Text('data')),
            ListTile(
              title: Text('ADD Data'),
              onTap: () {
                Navigator.push(
                    context,
                    MaterialPageRoute(
                      builder: (context) => FormDataEx(),
                    ));
              },
            ),
            ListTile(
              title: Text('SHOW DATA'),
              onTap: () {
                Navigator.push(
                    context,
                    MaterialPageRoute(
                      builder: (context) => showData(),
                    ));
              },
            ),
            ListTile(
              title: Text('asd'),
            ),
            ListTile(
              title: Text('GOSTHNC'),
            ),
          ],
        ),
      ),
    );
  }
}
