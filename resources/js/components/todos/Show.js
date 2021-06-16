import React  from 'react';
//import { Link } from 'react-router-dom';
import { useQuery } from '@apollo/client';
import { GET_TODO } from '../../graphql/todo';
//import client from '../../apollo-client'

function TodosShow(props) {
//  console.log(props.match.params.id)
    const id = parseInt(props.match.params.id)
    const { loading, error, data } = useQuery(GET_TODO ,
      { variables: {id} , fetchPolicy: "network-only" }
    );    
    if (loading) return <p>Loading...</p>;
    if (error) return <p>Error :(</p>;
console.log(data.todo)
    return (
      <div className="container py-2">
        <h3>Todos - Show</h3>
        <hr />
        <h1>{data.todo.title}</h1>
        ID : {data.todo.id}
        <hr />
      </div>
    );
  }
  export default TodosShow;