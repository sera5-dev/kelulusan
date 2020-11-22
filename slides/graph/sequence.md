sequenceDiagram
    User->>+Web: Prediction.. click! fill the form.. submit
    Web->>+Services: Hey!, please predict this request data
    Services->>+Model: Prediction? okay..
    Model->>-Model: I'm gonna save this first somewhere
    Model->>+Dataset: Dataset, give me your data!
    Dataset-->>-Model: Okay sir..
    Model->>+Model: Eww.. your data is very dirty lemme clean it
    Model->>+Model: Okay Let's build the model
    Model->>+Model: Nice, now predict the request data
    Model-->>-Services: This is the result dude..
    Services-->>-Web: I'm gonna give it now real quick
    Web->>+Database: I have to store this data to the db first before give it to user
    Database->>-Web: Saved..
    Web-->>-User: This is the prediction result
