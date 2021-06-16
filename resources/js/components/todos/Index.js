import React  from 'react';
import { Link } from 'react-router-dom';
import IndexRow from './IndexRow';
//import LibTodo from '../../libs/LibTodo';
import { useQuery } from "@apollo/client";
import { GET_TODOS } from '../../graphql/todo';

function TodosIndex() {
  const { loading, error, data } = useQuery(GET_TODOS, {
    fetchPolicy: "network-only"
  })  
  if (loading) return <p>Loading...</p>;
  if (error) return <p>Error :(</p>;
console.log(data.todos)
  return (
    <div className="container py-2">
      <h3>Todos - index</h3>
      <hr />
      <Link to={`/todos_create`} >
          <button>Create</button>
      </Link>      
      <hr />
      {data.todos.map((item ,index) => (
      <IndexRow obj={item} key={index} />
      ))}
    </div>
  );
}
export default TodosIndex;