import React  from 'react';
import { useState ,useEffect  } from 'react';
import axios  from 'axios';

function Page() {
  const [count, setCount] = useState(0);

  const func1=async function(){
    var name1 = document.getElementById('name1');
    console.log("func1: " + name1.value)
    var item = {
      name: "name1",
    }
console.log( item )
    const response = await axios.post(
      'http://localhost:8000/api/test/test2', item 
    )    
//    const response = await axios.get("http://localhost:8000/api/test/test")
    var data = await response.data    
console.log(data)
  }
  return (
    <div className="container">
      <h3>Test2</h3>
      <hr />
      <p>You clicked {count} times</p>
      <button onClick={() => {setCount(count + 1)}}>
        Click me
      </button>
      <hr />
      <input type="text" name="name1" id="name1" />
      <button onClick={() => {func1()}}>
        Test2
      </button>      
    </div>
  );
}
export default Page;
