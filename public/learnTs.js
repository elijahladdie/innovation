"use strict";
/*
 interface IsPerson {
    name: string;
    age: number;
    speak(a: string): void;
    spend(a: number): number;
   }
    const me: IsPerson = {
    name: "laddie",
    age: 19,
    speak(text: string): void {
      console.log(text);
    },
    spend(amount: number): number {
      console.log("I spent ", amount);
      return amount;
    },
    };
    const greetPerson = (person: IsPerson) => {
        console.log("Hello,", person.name);
    };
    greetPerson(me);
    let docs: HasFormatter[] = [];
    docs.push(docOne,docTwo)
    console.log(docs)
    const invOne = new Invoice("Laddie", "Developing web", 600);
    const invTwo = new Invoice("Kelly", "Deploying website", 1000);
    let invoices: Invoice[] = [];
    console.log(invoices);
    invoices.push(invOne, invTwo);
    invoices.forEach((inv) => {
    console.log(inv.client, inv.amount, inv.format());
});
*/

// ---------------------------------

// GENERICS 
/**
    const addUID = <T extends {name:string}>(obj:T) =>{
    let uid = Math.floor(Math.random()*100);
    return {...obj,uid}
  }
  let docOneI = addUID({name: 'yoshi',age:40});

  console.log(docOneI.uid)
  // with interfaces

  interface Resource<T>  {
    uid: number;
    resourceName: string;
    data: T
  }
  const docThree: Resource<object> ={
    uid: 1,
    resourceName: 'Person',
    data:{name: 'shaun'}
  }
  const docFour: Resource<string[]> ={
    uid: 2,
    resourceName: 'ShoppingList',
    data: ["bread", 'milk','rolls']
  }

  console.log(docFour,docThree)
*/

//   -----------------

// ENUM 


/**
    ResourceType { BOOK, AUTHOR, FILM, DIRECTOR, PERSON}

    interface Resource<T>  {
        uid: number;
        resourceType: ResourceType;
        data: T
    }
    const docThree: Resource<object> ={
        uid: 1,
        resourceType: ResourceType.BOOK,
        data:{title: 'name of the wind'}
    }
    const docFour: Resource<object> ={
        uid: 2,
        resourceType: ResourceType.FILM ,
        data: {name:"yoshi"}
  }

  console.log(docThree,docFour)
*/

//   ÷----------------------

// TUPLES
/**
    let arr = ['arr',25,true];
    arr[0] = false;
    arr[1] = 'yoshi';
    arr = [30,false,'yoshi'];
    let tup: [string,number,boolean] =[ 'arr',25,true];
*/