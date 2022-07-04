import React from 'react';
import './App.css';
//bootstrap
import 'bootstrap/dist/css/bootstrap.min.css';
//Axios for get request
import axios from 'axios';
class Read extends React.Component {
 //initialize an object's state in a class
  constructor(props) {
    super(props)
      this.state = {
        data: []
              }
      }
      //ComponentDidMount is use to Connect a React app to external applications, such as web APIs or JavaScript functions
      componentDidMount(){
        //get request
        axios.get('http://localhost/read.php').then(res => 
        {
        
        this.setState({data: res.data});
           }); 
        
        }
    
 
  render() {
   
    return (
     
      <div className="maincontainer">
       
        <h1 className="mr-5 ml-5 mt-5">Latest Feedback</h1>
        <div className="container mb-5 mt-5 text-left">
        
        <table class="table table-hover">
          <thead>
            <tr>
              <th>email</th>
              <th>username</th>
              <th>message</th>
            </tr>
          </thead>
          <tbody>
          {this.state.data.map((result) => {
            return (
             
                 <tr>
                  <td>{result.email}</td>
                  <td>{result.username}</td>
                  <td>{result.message}</td>
                </tr>
             
            )
          })}
           
            
          </tbody>
        </table>
       
            
      </div>
     
      </div>
     
)
};
}
export default Read;