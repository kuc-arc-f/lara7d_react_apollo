import React  from 'react';
//import { Link } from 'react-router-dom';
import { useQuery ,useMutation } from '@apollo/client';
import { GET_TODO } from '../../graphql/todo';
import { UPDATE_TODO } from '../../graphql/todo';
import { DELETE_TODO } from '../../graphql/todo';

function TodosShow(props) {
    const id = parseInt(props.match.params.id)
    const { loading, error, data } = useQuery(GET_TODO ,
      { variables: {id} , fetchPolicy: "network-only" }
    );
    const [UpdateTodo, { retData }] = useMutation(UPDATE_TODO);
console.log(retData)
    const [ RemoveTodo , { deleteData }] = useMutation(DELETE_TODO);
console.log(deleteData)    
    if (loading) return <p>Loading...</p>;
    if (error) return <p>Error :(</p>;
    const clickHandler= function(){
      var title = document.getElementById('title');
//console.log("clickHandler: " + title.value)
      UpdateTodo({ variables: { id: id,  title: title.value } });
      alert("Complete, update");
      props.history.push("/todos");
    }
    const deleteHandler= function(){
//console.log("clickHandler: " + title.value)
      RemoveTodo({ variables: { id: id } });
      alert("Complete, delete");
      props.history.push("/todos");
    }    
    return (
      <div className="container py-2">
        <h3>Todos - Edit</h3>
        ID : {data.todo.id}
        <hr />
        <input type="text" name="title" id="title"
         defaultValue={data.todo.title} />
        <button onClick={() => {clickHandler()}}>
          UpdateTodo
        </button>   
        <hr />   
        <button onClick={() => {deleteHandler()}}>
          DeleteTodo
        </button>
      </div>
    );
  }
  export default TodosShow;