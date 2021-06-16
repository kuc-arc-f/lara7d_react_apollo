import React  from 'react';
// import { useState ,useEffect  } from 'react';
//import { Link } from 'react-router-dom';
import { useMutation } from '@apollo/client';
import { ADD_TODO } from '../../graphql/todo';

function TodosCreate(props) {
//  const { loading, error, refetch } = useQuery(GET_TODOS)
  const [AddTodo ] = useMutation(ADD_TODO);
// console.log(data)
  const clickHandler= async function(){
    var title = document.getElementById('title');
// console.log("clickHandler: " + title.value)
    await AddTodo({ variables: { title: title.value } });
    title.value= ''
    props.history.push("/todos");
  }

  return (
  <div className="container py-2">

    <h3>Todos - Create</h3>
    <hr />
    <input type="text" name="title" id="title" />
    <button onClick={() => {clickHandler()}}>
      AddTodo
    </button>      
    <hr />
  </div>
  );
}
export default TodosCreate;
